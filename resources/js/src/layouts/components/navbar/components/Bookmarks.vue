<template>
    <div class="navbar-bookmarks flex items-center">

        <div class="bookmark-container" style="background: orangered;
    border: solid 0px;
    border-radius: 4px;min-width: 420px;">
            <vs-button color="light" type="line" icon-pack="feather" icon="icon-search"
                       @click.stop="showBookmarkPagesDropdown = !showBookmarkPagesDropdown">{{selectedT}}
            </vs-button>
            <div v-click-outside="outside" class="absolute bookmark-list w-1/2 xl:w-1/2 mt-4"
                 style="width: 40% !important;" v-if="showBookmarkPagesDropdown">
                <vx-auto-suggest
                    ref="bookmarkAutoSuggest"
                    :autoFocus="true"
                    :data="selectedInsRes"
                    :initalData="{pages: selectedIns}"
                    :searchLimit="8"
                    placeholder="Search Institutes"
                    inputClassses="w-full"
                    show-action
                    show-pinned
                    hideGroupTitle
                    background-overlay
                    @input="hnd_search_query_update"
                    @selected="selected">

                    <!-- Pages Suggestion -->
                    <template v-slot:pages="{ suggestion }">
                        <div class="flex items-center justify-between">
                            <div class="flex items-end leading-none py-1">
                                <span class="mt-1">{{ suggestion.name}}</span>
                            </div>
                        </div>
                    </template>

                </vx-auto-suggest>
            </div>
        </div>
        <vs-button v-if="canSee" style="margin-left: 10px" color="primary" type="filled" icon-pack="feather"
                   icon="icon-plus" @click.stop="openAddProp"></vs-button>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import VxAutoSuggest from '@/components/vx-auto-suggest/VxAutoSuggest.vue'
    import axios from "axios";

    export default {
        props: {
            navbarColor: {
                type: String,
                default: "#fff",
            },
        },
        components: {
            draggable,
            VxAutoSuggest
        },
        data() {
            return {
                showBookmarkPagesDropdown: false,
                selectedIns: null,
                selectedInsRes: null,
                selectedT: null
            }
        },
        watch: {
            '$route'() {
                if (this.showBookmarkPagesDropdown) this.showBookmarkPagesDropdown = false
            }
        },
        computed: {
            canSee() {
                this.$acl.check(this.$store.state.AppActiveUser.userRole)
                return this.$acl.check(this.$router.match('/properties/add').meta.rule);
            },
            navbarSearchAndPinList() {
                var user = localStorage.getItem("userId");
                axios.post('/api/getInstitutes', {
                    'user': user
                }).then((res) => {
                    // this.selectedIns = res.data;
                    return {pages: res.data}
                })
                    .catch((err) => {
                        console.log(err)
                    })
                // return {pages: this.$store.state.navbarSearchAndPinList["pages"]}
            },
            starredPages() {
                return this.$store.state.starredPages
            },
            starredPagesLimited: {
                get() {
                    return this.starredPages.slice(0, 10)
                },
                set(list) {
                    this.$store.dispatch('arrangeStarredPagesLimited', list)
                }
            },
            starredPagesMore: {
                get() {
                    return this.starredPages.slice(10)
                },
                set(list) {
                    this.$store.dispatch('arrangeStarredPagesMore', list)
                }
            },
            textColor() {
                return {'text-white': this.$store.state.mainLayoutType === 'vertical' && this.navbarColor != (this.$store.state.theme === 'dark' ? "#10163a" : "#fff")}
            }
        },
        methods: {
            getProp() {
                var user = localStorage.getItem("userId");
                axios.post('/api/getInstitutes', {
                    'user': user
                }).then((res) => {
                    this.selectedT = res.data[0].name
                    this.selectedIns = res.data
                    this.selectedInsRes = res
                    localStorage.setItem('globalIns', res.data[0].id);
                })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            openAddProp() {
                this.$router.push('/properties/add').catch(() => {
                })
            },
            selected(obj) {
                this.selectedT = obj[0].name;
                // this.$vs.loading()
                localStorage.setItem('globalIns', obj[0].id);
                this.$store.commit('TOGGLE_CONTENT_OVERLAY', false)
                this.showBookmarkPagesDropdown = false
                // this.$vs.loading.close()
                this.$router.push('/dashboard').catch(() => {})
            },
            actionClicked(item) {
                this.$store.dispatch('updateStarredPage', {url: item.url, val: !item.is_bookmarked})
                // this.$refs.bookmarkAutoSuggest.filterData()
            },
            outside: function () {
                this.showBookmarkPagesDropdown = false
            },
            hnd_search_query_update(query) {
                // Show overlay if any character is entered
                this.$store.commit('TOGGLE_CONTENT_OVERLAY', query ? true : false)
            }
        },
        beforeMount() {
            this.getProp();
        },
        directives: {
            'click-outside': {
                bind: function (el, binding) {
                    const bubble = binding.modifiers.bubble
                    const handler = (e) => {
                        if (bubble || (!el.contains(e.target) && el !== e.target)) {
                            binding.value(e)
                        }
                    }
                    el.__vueClickOutside__ = handler
                    document.addEventListener('click', handler)
                },

                unbind: function (el) {
                    document.removeEventListener('click', el.__vueClickOutside__)
                    el.__vueClickOutside__ = null

                }
            }
        }
    }

</script>
