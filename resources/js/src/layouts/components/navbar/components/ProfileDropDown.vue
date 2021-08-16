<template>
  <div class="the-navbar__user-meta flex items-center" v-if="activeUserInfo.displayName">

    <div class="text-right leading-tight hidden sm:block">
      <p class="font-semibold">{{this.name.user != null ? this.name.user.name : ''}}</p>
      <small>Available</small>
        <div id="token"></div>
    </div>

    <vs-dropdown vs-custom-content vs-trigger-click class="cursor-pointer">

      <div class="con-img ml-3">
        <img key="onlineImg" :src="this.name.user.image != null ? '/images/users/'+this.name.user.image : activeUserInfo.photoURL" alt="user-img" width="40" height="40" class="rounded-full shadow-md cursor-pointer block" />
      </div>

      <vs-dropdown-menu class="vx-navbar-dropdown">
        <ul style="min-width: 9rem">

          <li
            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
            @click="$router.push('/pages/profile').catch(() => {})">
            <feather-icon icon="UserIcon" svgClasses="w-4 h-4" />
            <span class="ml-2">Profile</span>
          </li>

<!--          <li-->
<!--            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"-->
<!--            @click="$router.push('/apps/email').catch(() => {})">-->
<!--            <feather-icon icon="MailIcon" svgClasses="w-4 h-4" />-->
<!--            <span class="ml-2">Inbox</span>-->
<!--          </li>-->

<!--          <li-->
<!--            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"-->
<!--            @click="$router.push('/apps/todo').catch(() => {})">-->
<!--            <feather-icon icon="CheckSquareIcon" svgClasses="w-4 h-4" />-->
<!--            <span class="ml-2">Tasks</span>-->
<!--          </li>-->

<!--          <li-->
<!--            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"-->
<!--            @click="$router.push('/apps/chat').catch(() => {})">-->
<!--            <feather-icon icon="MessageSquareIcon" svgClasses="w-4 h-4" />-->
<!--            <span class="ml-2">Chat</span>-->
<!--          </li>-->

<!--          <li-->
<!--            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"-->
<!--            @click="$router.push('/apps/eCommerce/wish-list').catch(() => {})">-->
<!--            <feather-icon icon="HeartIcon" svgClasses="w-4 h-4" />-->
<!--            <span class="ml-2">Wish List</span>-->
<!--          </li>-->

          <vs-divider class="m-1" />

          <li
            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
            @click="logout">
            <feather-icon icon="LogOutIcon" svgClasses="w-4 h-4" />
            <span class="ml-2">Logout</span>
          </li>
        </ul>
      </vs-dropdown-menu>
    </vs-dropdown>
      <vs-prompt
          title="Session Expired"
          @cancel="val=''"
          type="confirm"
          :active.sync="activePrompt" id="tokenExpored">
          <div class="con-exemple-prompt">
              <vx-card>
                  <div slot="no-body" class="full-page-bg-color">
                      <div class="vx-row no-gutter">
                          <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                              <img src="@assets/images/pages/lock-screen.png" alt="login" class="mx-auto">
                          </div>
                          <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center d-theme-dark-bg">
                              <div class="p-8">
                                  <div class="vx-card__title mb-8">
                                      <h4 class="mb-4">Your Session is Expired</h4>
                                  </div>
                                  <vs-input icon-no-border icon="icon icon-user" icon-pack="feather" label-placeholder="Username" v-model="value1" class="w-full mb-6"/>
                                  <vs-input icon-no-border icon="icon icon-lock" icon-pack="feather" type="password" label-placeholder="Password" v-model="value2" class="w-full mb-6" />

                                  <div class="flex justify-between flex-wrap">
<!--                                      <router-link to="/pages/login" class="mb-4">Are you not John Doe?</router-link>-->
                                      <vs-button class="ml-2" @click="updateLogin">Unlock</vs-button>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
              </vx-card>
          </div>
      </vs-prompt>
  </div>
</template>

<script>
import firebase from 'firebase/app'
import 'firebase/auth'
import axios from "axios";
export default {
  data() {
    return {
        name:'',
        activePrompt:false,
        val:'',
            value1:'',
            value2:'',
        token: localStorage.getItem("usertoken")
    }
  },
  computed: {
    activeUserInfo() {
        console.log(this.$store.state.AppActiveUser)
      return this.$store.state.AppActiveUser
    }
  },
  methods: {
      show(){
          this.activePrompt = true;
      },
      acceptAlert(){
          this.$vs.notify({
              color:'success',
              title:'Accept Selected',
              text:'Lorem ipsum dolor sit amet, consectetur'
          })
      },
      close(){
          this.$vs.notify({
              color:'danger',
              title:'Closed',
              text:'You close a dialog!'
          })
      },
      getUSer(){
          console.log(localStorage.getItem('usertoken'));
          axios.get('/api/profile',
              {
                  headers:{
                      Authorization: 'Bearer'+this.token+''
                  }
              })
              .then((res) => {
                  console.log(res.data);
                  // console.log(res.data.user.roles[0].name.toLowerCase())
                  if(res.data[0] == "token_expired"){
                      this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: 'admin'})
                      this.$router.push('/login').catch(() => {})
                      localStorage.removeItem("usertoken")
                      localStorage.removeItem("userRole")
                      this.$router.push({ name: 'page-login' })
                      // this.activePrompt = true;
                  }
                  localStorage.setItem("userId",JSON.stringify(res.data.user.id));
                  this.name = res.data;
                  this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: res.data.user.roles[0].name.toLowerCase()})
              })
              .catch((err) => {
                  console.log(err)
              })
      },
      updateLogin() {
          // Loading
          this.$vs.loading()

          axios.post('/api/login',
              {
                  email:this.value1,
                  password:this.value2,
              })
              .then((res) => {
                  // this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: ""})
                  localStorage.removeItem('usertoken')
                  localStorage.setItem('usertoken', res.data.token)
                  this.value1 = ''
                  this.value2 = ''
                  this.$vs.loading.close();
                  this.activePrompt = false;

              })
              .catch((err) => {
                  console.log(err)
              })
      },
    logout() {

        // if user is logged in via auth0
        if (this.$auth.profile) this.$auth.logOut();

        // if user is logged in via firebase
        const firebaseCurrentUser = firebase.auth().currentUser

        if (firebaseCurrentUser) {
            firebase.auth().signOut().then(() => {
                localStorage.removeItem('userRole');
                this.$router.push('/login').catch(() => {})
            })
        }
        if(localStorage.getItem("usertoken")) {
            localStorage.removeItem("usertoken")
            localStorage.removeItem("userId")
            localStorage.removeItem('userRole');
            this.$router.push('/login').catch(() => {})
        }
        // If JWT login
        if(localStorage.getItem("accessToken")) {
            localStorage.removeItem('userRole');
          localStorage.removeItem("accessToken")
          this.$router.push('/login').catch(() => {})
        }

        // Change role on logout. Same value as initialRole of acj.js
        this.$acl.change('admin')
        localStorage.removeItem('userInfo')
        localStorage.removeItem('userRole');

        // This is just for demo Purpose. If user clicks on logout -> redirect
        this.$router.push('/login').catch(() => {})
    },
  },
    beforeMount() {
      this.getUSer();
    }
}
</script>
<style>
    #tokenExpored .vs-dialog{
        max-width: 60%!important;
    }
    #tokenExpored .vs-dialog footer{
        display: none!important;
    }
    #tokenExpored .vs-dialog header{
        display: none!important;
    }
</style>
