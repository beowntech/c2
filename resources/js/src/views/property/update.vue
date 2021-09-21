<template>
    <div class="vx-row">
        <div class="vx-col w-full">
            <vx-card title="Update Basic Info" class="mb-4">
                <div class="vx-row">
                    <div class="vx-col w-full">
                        <div class="vx-row">
                            <div class="vx-col md:w-1/2 w-full">
                                <img v-if="image" :src="image" style="max-width: 30%;">
                                <input type="file" class="hidden" ref="uploadImgInput" name="image" @change="showImage"
                                       accept="image/*" v-validate="'required'">
                                <vs-button @click="$refs.uploadImgInput.click()">Change Logo</vs-button>
                                <br>
                                <span class="text-danger">{{ errors.first('step-1.image') }}</span>
                            </div>
                            <div class="vx-col md:w-1/2 w-full">
                                <img v-if="featuredImage" :src="featuredImage" style="max-width: 60%;">
                                <input type="file" class="hidden" ref="uploadFeaturedInput" name="image"
                                       @change="showFeatured"
                                       accept="image/*" v-validate="'required'">
                                <vs-button @click="$refs.uploadFeaturedInput.click()">Change Featured</vs-button>
                                <br>
                                <span class="text-danger">{{ errors.first('step-1.image') }}</span>
                            </div>
                        </div>
                        <div class="vx-row">
                            <div class="vx-col md:w-1/2 w-full">
                                <vs-input label="Name" v-model="property_name" type="text" class="w-full mt-4"
                                          name="property_name" v-validate="'required|alpha_spaces'"/>
                                <span class="text-danger">{{ errors.first('step-1.property_name') }}</span>
                            </div>
                            <div class="vx-col md:w-1/2 w-full">
                                <vs-input label="Short Name" v-model="property_short_name" type="text"
                                          class="w-full mt-4" name="property_short_name"
                                          v-validate="'required|alpha_spaces'"/>
                                <span class="text-danger">{{ errors.first('step-1.property_short_name') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-full">
                        <vs-textarea v-model="textarea" counter="1000" :counter-danger.sync="counterDanger"
                                     label="Short Description (Maximum 1000 Characters)" name="short_description"
                                     class="md:mt-10 mt-6 mb-0" rows="3" v-validate="'required'"/>
                        <span class="text-danger">{{ errors.first('step-1.property_short_description') }}</span>
                    </div>
                    <div class="vx-col md:w-1/2 w-full">
                        <vs-input label="Approved By" v-model="approved_by" class="w-full mt-4" name="approvedby"/>
                        <span class="text-danger">{{ errors.first('step-1.approvedby') }}</span>

                        <vs-input label="Established On" class="w-full mt-4" v-model="established_on"
                                  name="establishedon" v-validate="'numeric'"/>
                        <span class="text-danger">{{ errors.first('step-1.establishedon') }}</span>
                    </div>
                    <div class="vx-col md:w-1/2 w-full">
                        <vs-input label="Affiliated By" v-model="affiliated_by" class="w-full mt-4"
                                  name="affiliatedby"/>
                        <span class="text-danger">{{ errors.first('step-1.affiliatedby') }}</span>

                        <vs-input label="College Email" class="w-full mt-4" name="email" v-model="EmailEnter"
                                  v-validate="'required|email'"/>
                        <span class="text-danger">{{ errors.first('step-1.email') }}</span>
                        <!--                        <vs-input label="Language Spoken" v-model="Language"  class="w-full mt-4" name="language_spoken" v-validate="'required|alpha_spaces'" />-->
                        <!--                        <span class="text-danger">{{ errors.first('step-1.language_spoken') }}</span>-->
                    </div>
                    <div class="vx-col md:w-1/2 w-full">
                        <vs-select v-model="college_type" class="w-full select-large mt-5" name="college_type"
                                   label="College Type" v-validate="'required|'">
                            <vs-select-item value="1" text="Public" class="w-full"/>
                            <vs-select-item value="2" text="Private" class="w-full"/>
                            <vs-select-item value="3" text="Govt" class="w-full"/>
                            <vs-select-item value="4" text="Deamed" class="w-full"/>
                        </vs-select>
                        <span class="text-danger">{{ errors.first('step-1.college_type') }}</span>
                    </div>
                    <div class="vx-col md:w-1/2 w-full">
                        <vs-input label="College Contact Number" class="w-full mt-4" v-model="Hotel"
                                  name="hotel_contact" v-validate="'required|digits:10'"/>
                        <span class="text-danger">{{ errors.first('step-1.hotel_contact') }}</span>

                    </div>
                    <div class="vx-col w-full">
                        <vs-button style="float: right" @click="updateBasic">UPDATE</vs-button>
                    </div>

                </div>
            </vx-card>
        </div>
        <div class="vx-col w-full">
            <vx-card title="Category" class="mb-4">
                <div class="vx-row">
                        <ul class="demo-alignment" :key="index" v-for="(items,index) in amenities">
                            <li :key="indexs" v-for="(items,indexs) in amenities[index].children">
                                <vs-checkbox v-model="amenitiesValue" v-bind:vs-value="items.id">{{items.name}}</vs-checkbox>
                            </li>
                        </ul>
                </div>
            </vx-card>
        </div>

        <div class="vx-col w-full">
            <vx-card title="Long Description" class="mb-4">
                <div class="vx-row">
                    <div class="vx-col w-full">
                        <quill-editor v-model="textareaLong" name="property_description"
                                      class="md:mt-10 mt-6 mb-0"></quill-editor>
                        <!--                            <vs-textarea v-model="textareaS" label="Description" name="property_description" class="md:mt-10 mt-6 mb-0" rows="3" />-->
                        <span class="text-danger">{{ errors.first('step-2.property_description') }}</span>
                    </div>
                    <div class="vx-col w-full mt-3">
                        <vs-button style="float: right" @click="updateDescription">UPDATE</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col w-full">
            <vx-card title="Address" class="mb-4">
                <div class="vx-row">
                    <div class="vx-col w-full">
                        <vs-input label="Street Name" v-model="addressValue" class="w-full mt-5" name="address_text"
                                  v-validate="'required'"/>
                        <span class="text-danger">{{ errors.first('step-3.address_text') }}</span>
                    </div>
                    <div class="vx-col md:w-1/2 w-full">
                        <vs-input label="Local Area" v-model="local_area" class="w-full mt-5" name="village_name"
                                  v-validate="'required'"/>
                        <span class="text-danger">{{ errors.first('step-3.village_name') }}</span>
                    </div>
                    <div class="vx-col md:w-1/2 w-full">
                        <vs-input label="Nationality" v-model="nationality" class="w-full mt-5" value="India"
                                  name="district_name" v-validate="'required'"/>
                        <span class="text-danger">{{ errors.first('step-3.district_name') }}</span>
                    </div>
                    <!--                    <div class="vx-col md:w-1/2 w-full">-->
                    <!--                        <vs-input label="Road Name" v-model="roadName" class="w-full mt-5" name="road_name" v-validate="'required'" />-->
                    <!--                        <span class="text-danger">{{ errors.first('step-3.road_name') }}</span>-->
                    <!--                    </div>-->
                    <div class="vx-col md:w-1/2 w-full mt-5">
                        <h6>State</h6>
                        <v-select v-model="stateSelect" autocomplete="nope" class="mt-1" placeholder="Select State"
                                  @input="enableCity" :options="stateOptions" :dir="$vs.rtl ? 'rtl' : 'ltr'"/>
                    </div>
                    <div class="vx-col md:w-1/2 w-full mt-5">
                        <h6>City</h6>
                        <v-select :disabled="disableC || stateSelect == null" autocomplete="nope" v-model="citySelect"
                                  class="mt-1" placeholder="Select City" :options="cityOptions"
                                  :dir="$vs.rtl ? 'rtl' : 'ltr'"/>
                        <!--                            <vs-select v-model="citySelect" class="w-full select-large" label="City">-->
                        <!--                                <vs-select-item :key="index" :value="item.id" :text="item.name"-->
                        <!--                                                v-for="(item,index) in cityOptions" class="w-full"/>-->
                        <!--                            </vs-select>-->
                    </div>
                    <div class="vx-col md:w-1/2 w-full mt-5">
                        <vs-input label="Pin Code" v-model="pinCode" class="w-full" name="pincode"
                                  v-validate="'required'"/>
                        <span class="text-danger">{{ errors.first('step-3.pincode') }}</span>
                    </div>
                    <div class="vx-col w-full">
                        <vs-button style="float: right" @click="updateLocation">UPDATE</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import $ from "jquery";
    import {FormWizard, TabContent} from "vue-form-wizard";
    import vSelect from "vue-select";
    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'
    import {quillEditor} from 'vue-quill-editor'

    import apiurl from '../apiUrls/index'

    export default {
        data: function () {
            return {
                amenities: [],
                counterDanger: false,
                property_name: "",
                email: "",
                district: "",
                roadName: "",
                pinCode: "",
                citySelect: {},
                stateSelect: {},
                addressValue: "",
                selectedLogo: null,
                featuredImage: null,
                selectedFeatured: null,
                EmailEnter: "",
                cityOptions: [],
                college_type: "",
                stateOptions: [],
                Hotel: "",
                Language: "",
                textarea: "",
                disableC: false,
                status: "plannning",
                currPropId: null,
                property_short_name: "",
                parkingSelect: "0",
                propSize: "",
                village: "",
                policy: "",
                images: [],
                selectedFiles: [],
                local_area: "",
                nationality: "",
                RoomLength: "",
                affiliated_by: "",
                approved_by: "",
                established_on: "",
                RoomBreadth: "",
                textareaLong: "",
                gallery: [],
                dataLoaded:false,
                managersSelect: null,
                amenitiesValue: [],
            }
        },
        watch:{
            amenitiesValue:function () {
                if(this.dataLoaded) {
                    this.updateCategory()
                }
            }
        },
        methods: {

            updateBasic() {
                const bodyFormData = new FormData();
                bodyFormData.append('name', this.property_name)
                bodyFormData.append('prop_id', parseInt(this.$route.params.PropId))
                bodyFormData.append('sname', this.property_short_name)
                //bodyFormData.append('language', this.Language);
                //bodyFormData.append('type', this.selectedCategory);
                bodyFormData.append('sdescription', this.textarea);
                bodyFormData.append('email', this.EmailEnter);
                bodyFormData.append('hotel', Number(this.Hotel));
                if (this.selectedLogo != null) {
                    bodyFormData.append('logo', this.selectedLogo);
                }
                if (this.selectedFeatured != null) {
                    bodyFormData.append('featured', this.selectedFeatured);
                }
                bodyFormData.append('aff', this.affiliated_by);
                bodyFormData.append('app', this.approved_by);
                bodyFormData.append('est', this.established_on);
                bodyFormData.append('program', this.program_type);
                bodyFormData.append('college', this.college_type);
                axios.post('/api/properties/update/basic', bodyFormData)
                    .then((res) => {
                        console.log(res)
                        if (res.data['status'] == 1) {
                            this.alert('Basic Updated Successfully', '', 'success');
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateLocation() {
                const bodyFormData = new FormData();
                bodyFormData.append('street_name', this.addressValue)
                bodyFormData.append('local_area', this.local_area)
                bodyFormData.append('pincode', parseInt(this.pinCode))
                bodyFormData.append('state', parseInt(this.stateSelect.id))
                bodyFormData.append('city', parseInt(this.citySelect.id))
                bodyFormData.append('nationality', this.nationality)
                bodyFormData.append('prop_id', parseInt(this.$route.params.PropId))
                axios.post('/api/properties/update/location', bodyFormData)
                    .then((res) => {
                        console.log(res)
                        if (res.data['status'] == 1) {
                            this.alert('Locations Updated Successfully', '', 'success');
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateDescription() {
                const bodyFormData = new FormData();
                bodyFormData.append('description', this.textareaLong)
                bodyFormData.append('prop_id', parseInt(this.$route.params.PropId))
                axios.post('/api/properties/update/description', bodyFormData)
                    .then((res) => {
                        console.log(res)
                        if (res.data['status'] == 1) {
                            this.alert('Description Updated Successfully', '', 'success');
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getAmen() {
                axios.post('/api/amenities/get')
                    .then((res) => {
                        this.amenities = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getCat() {
                axios.post('/api/categories/getNames')
                    .then((res) => {
                        console.log(res)
                        this.categories = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getData() {
                axios.post('/api/cities/get')
                    .then((res) => {
                        // this.cityOptions = res.data.city;
                        this.stateOptions = res.data.state;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getCity() {
                axios.post('/api/city/get', {id: this.stateSelect.id})
                    .then((res) => {
                        this.cityOptions = [];
                        this.cityOptions = res.data;
                        this.disableC = false;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getBasic() {
                axios.post('/api/properties/getProp',
                    {
                        prop_id: this.$route.params.PropId
                    })
                    .then((res) => {
                        this.property_name = res.data[0].name;
                        this.property_short_name = res.data[0].short_name;
                        this.textarea = res.data[0].short_description;
                        this.textareaLong = res.data[0].description;
                        this.approved_by = res.data[0].approved_by;
                        this.affiliated_by = res.data[0].affiliated_by;
                        this.established_on = res.data[0].established_on;
                        this.EmailEnter = res.data[0].email;
                        this.college_type = res.data[0].college_type;
                        this.amenitiesValue = JSON.parse(res.data[0].property_type);
                        this.Hotel = res.data[0].hotel_contact;
                        this.featuredImage = apiurl.mediaUrl + "property/" + res.data[0].id + '/gallery/featured/' + res.data[0].images[0].featured + '-xl.webp';
                        this.image = apiurl.mediaUrl + "property/" + res.data[0].id + '/logo/' + res.data[0].logo + '-md.webp';
                        this.$vs.loading.close()
                        this.dataLoaded = true
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateCategory(){
                if(this.amenitiesValue.length != 0) {
                    axios.post('/api/properties/step3',
                        {
                            catg: this.amenitiesValue,
                            prop_id: this.$route.params.PropId
                        })
                        .then((res) => {
                            if (res.data['status'] == 1) {
                                this.alert('Category Updated Successfully','','green')
                            }
                        })
                        .catch((err) => {
                            this.alert('Problem while updating Category!','','red')
                            console.log(err)
                        })
                }
            },
            getLocation() {
                axios.post('/api/properties/getLocation',
                    {
                        prop_id: this.$route.params.PropId
                    })
                    .then((res) => {
                        if (res.data != 0) {
                            this.addressValue = res.data[0].street_name;
                            this.local_area = res.data[0].local_area;
                            this.pinCode = res.data[0].pincode;
                            this.nationality = res.data[0].nationality;
                            this.stateSelect = res.data[0].stat;
                            this.getCity()
                            this.citySelect = res.data[0].cit;
                        }
                        this.$vs.loading.close();

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            onFileChange(e) {
                const file = e.target.files[0];
                this.selectedLogo = file;
                this.url = URL.createObjectURL(file);
            },
            alert(title, text, color) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: 'top-right'
                });
            },
            enableCity() {
                this.getCity()
            },
            showImage(e) {
                const file = e.target.files[0];
                this.selectedLogo = file;
                this.image = URL.createObjectURL(file);
            },
            showFeatured(e) {
                const file = e.target.files[0];
                this.selectedFeatured = file;
                this.featuredImage = URL.createObjectURL(file);
            },
        },
        components: {
            FormWizard,
            TabContent,
            quillEditor,
            'v-select': vSelect,
        },
        beforeMount() {
            this.getData()
            this.getAmen()
            this.getBasic()
            this.getLocation()
            // this.getCat()
        },
    }
</script>

<style scoped>

</style>
