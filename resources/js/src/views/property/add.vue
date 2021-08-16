<template>
    <vx-card title="Colleges">
        <form-wizard id="fomrWizard" color="rgba(var(--vs-primary), 1)" ref="wizard"
                     errorColor="rgba(var(--vs-danger), 1)" :title="null" :subtitle="null" finishButtonText="Submit">
            <!-- tab 2 content -->
            <tab-content title="Basic Info" class="mb-5" icon="feather icon-briefcase" :before-change="validateStep1">
                <form data-vv-scope="step-1">
                    <div class="vx-row">
                        <div class="vx-col w-full">
                            <img v-if="image" :src="image" style="max-width: 40%">
                            <input type="file" class="hidden" ref="uploadImgInput" name="image" @change="showImage"
                                   accept="image/*" v-validate="'required'">
                            <vs-button @click="$refs.uploadImgInput.click()">Upload Logo</vs-button>
                            <br>
                            <span class="text-danger">{{ errors.first('step-1.image') }}</span>
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
                            <vs-input label="Affiliated By" v-model="affiliated_by" class="w-full mt-4" name="affiliatedby" />
                            <span class="text-danger">{{ errors.first('step-1.affiliatedby') }}</span>

                            <vs-input label="College Email" class="w-full mt-4" name="email" v-model="EmailEnter" v-validate="'required|email'"/>
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
                                      name="hotel_contact" v-validate="'required|numeric|max:13'"/>
                            <span class="text-danger">{{ errors.first('step-1.hotel_contact') }}</span>

                        </div>
                    </div>
                </form>
            </tab-content>
            <tab-content title="College Info" class="mb-5" icon="feather icon-briefcase" :before-change="validateStep2">
                <form data-vv-scope="step-2">
                    <div class="vx-row">
                        <div class="vx-col w-full">
                            <img v-if="featured" :src="featured" style="max-width: 40%">
                            <input type="file" class="hidden" ref="uploadImgInputF" name="featured"
                                   @change="showFeatured" accept="image/*" v-validate="'required'">
                            <vs-button @click="$refs.uploadImgInputF.click()">Upload Featured Image</vs-button>
                            <br>
                            <span class="text-danger">{{ errors.first('step-2.featured') }}</span>
                        </div>
                        <div class="vx-col w-full">
                            <quill-editor v-model="textareaS" name="property_description" class="md:mt-10 mt-6 mb-0"></quill-editor>
<!--                            <vs-textarea v-model="textareaS" label="Description" name="property_description" class="md:mt-10 mt-6 mb-0" rows="3" />-->
                            <span class="text-danger">{{ errors.first('step-2.property_description') }}</span>
                        </div>
                    </div>
                </form>
            </tab-content>
            <tab-content title="Category" class="mb-5" icon="feather icon-image" :before-change="validateStep3">
                <form data-vv-scope="step-3">
                    <div class="vx-row">
                        <ul class="demo-alignment" :key="indexs" v-for="(items,index) in amenities">
                            <li :key="indexs" v-for="(items,indexs) in amenities[index].children">
                                <vs-checkbox v-model="amenitiesValue" v-bind:vs-value="items.id">{{items.name}}</vs-checkbox>
                            </li>
                        </ul>
                    </div>
                </form>
            </tab-content>
            <tab-content title="Location" class="mb-5" icon="feather icon-image" :before-change="validateStep4">
                <form data-vv-scope="step-4">
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
                            <v-select v-model="stateSelect" autocomplete="nope" class="mt-5" placeholder="Select State" @input="enableCity" :options="stateOptions" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
                        </div>
                        <div class="vx-col md:w-1/2 w-full mt-5">
                            <v-select :disabled="disableC || stateSelect == null" autocomplete="nope" v-model="citySelect" class="mt-5" placeholder="Select City" @input="getStream" :options="cityOptions" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
                            <!--                            <vs-select v-model="citySelect" class="w-full select-large" label="City">-->
                            <!--                                <vs-select-item :key="index" :value="item.id" :text="item.name"-->
                            <!--                                                v-for="(item,index) in cityOptions" class="w-full"/>-->
                            <!--                            </vs-select>-->
                        </div>
                        <div class="vx-col md:w-1/2 w-full mt-5">
                            <vs-input label="Pin Code"  v-model="pinCode" class="w-full" name="pincode"
                                      v-validate="'required'"/>
                            <span class="text-danger">{{ errors.first('step-3.pincode') }}</span>
                        </div>
                    </div>
                </form>
            </tab-content>
        </form-wizard>
        <div class="row" style="display:none;padding: 50px" id="SuccessDone">
            <div class="col-md-12" style="text-align: center">
                <h3>Your Request has been sent to Admin</h3>
                <vs-button color="success" class="mt-4" @click="gotoList">Go to List</vs-button>
            </div>
        </div>
    </vx-card>
</template>

<script>
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    import vSelect from 'vue-select'
    import axios from "axios";
    import $ from 'jquery';
    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'
    // For custom error message
    import { quillEditor } from 'vue-quill-editor'
    import {Validator} from 'vee-validate';

    const dict = {
        custom: {
            image: {
                required: 'Logo is Required',
            },
            property_name: {
                required: 'Name is Required',
                alpha: "Name may only contain alphabetic characters"
            },
            property_short_name: {
                required: 'Short Name is Required',
                alpha: "Name may only contain alphabetic characters"
            },
            property_type: {
                required: 'Institute Type is Required',
            },
            property_description: {
                required: 'Description is Required',
            },
            property_short_description: {
                required: 'Short Description is Required',
            },
            program_type: {
                required: 'Please Select Program Type',
            },
            college_type: {
                required: 'Please Select College Type',
            },
            approvedby: {
                required: 'Approved By is Required',
            },
            affiliatedby: {
                required: 'Affiliated By is Required',
            },
            establishedon: {
                required: 'Established On is Required',
            },
            language_spoken: {
                required: 'Language Spoken is Required',
            },
            meal_option: {
                required: 'Meal Option is Required',
            },
            hotel_contact: {
                required: 'Contact Number is Required',
            },
            property_size: {
                required: 'Property Size is Required',
            },
            email: {
                required: 'Email is Required',
            },
            parking: {
                required: 'Parking is Required',
            },
            village_name: {
                required: 'Village Name is Required',
            },
            district_name: {
                required: 'District Name is Required',
            },
            road_name: {
                required: 'Road Name is Required',
            },
            pincode: {
                required: 'PinCode is Required',
            },
        }
    };

    // register custom messages
    Validator.localize('en', dict);

    export default {
        // props: {
        //     data: {
        //         type: Object,
        //         required: true,
        //     },
        // },
        data: function () {
            return {
                twitter: "",
                facebook: "",
                instagram: "",
                counterDanger: false,
                disableC: true,
                // data_local: JSON.parse(JSON.stringify(this.data)),
                property_name: "",
                property_short_name: "",
                email: "",
                parkingSelect: "0",
                propSize: "",
                village: "",
                policy: "",
                district: "",
                roadName: "",
                images: [],
                selectedFiles: [],
                pinCode: "",
                citySelect: "",
                local_area: "",
                nationality: "",
                stateSelect: "",
                RoomLength: "",
                affiliated_by: "",
                approved_by: "",
                established_on: "",
                RoomBreadth: "",
                roomName: "",
                beds: "",
                noofbeds: "",
                addressValue: "",
                maximum_guest: "",
                program_type: "",
                college_type: "",
                attach_bathroom: "",
                selectedFeatured: null,
                selectedCategory: "",
                EmailEnter: "",
                Hotel: "",
                Language: "",
                textareaS: "Long Description Here",
                extra_bed: "",
                url: null,
                length: "",
                breadth: "",
                textarea: "",
                eventName: "",
                eventLocation: "san-francisco",
                status: "plannning",
                room_card: [],
                managers: [],
                amenities: [],
                selectedClass: '',
                currPropId: null,
                policyContent: [],
                b2bprice: "",
                roomTypeOptions: [
                    {name: 'Premium', id: 1},
                    {name: 'Deluxe', id: 2},
                    {name: 'Normal', id: 3}
                ],
                cityOptions: [],
                stateOptions: [],
                classes: [
                    'danger',
                    'primary',
                    'success',
                    'rgb(32, 201, 192)'
                ],
                min: 1,
                max: 3,
                number: 0,
                gallery: [],
                managersSelect: null,
                amenitiesValue: [],
                room_type: "",
                social: [],
                image: null,
                featured: null,
                originalImage: null,
                originalImageF: null,
                bedOptions: [
                    {text: "1", value: 1},
                    {text: "2", value: 2},
                    {text: "3", value: 3},
                    {text: "4", value: 4},
                ],
                maximumGuestOptions: [
                    {text: "1", value: 1},
                    {text: "2", value: 2},
                    {text: "3", value: 3},
                    {text: "4", value: 4},
                    {text: "5", value: 5},
                    {text: "6", value: 6},
                    {text: "7", value: 7},
                    {text: "8", value: 8},
                    {text: "9", value: 9},
                    {text: "10", value: 10},
                ],
                categories: [],
                MealOption: [],
                MealOptionExclude: [],
                bathroomOptions: [
                    {text: "Yes", value: 1},
                    {text: "No", value: 0},
                ],
            }
        },
        created: function () {
            this.getRandomNumber()
        },
        methods: {
            validateStep1() {
                return new Promise((resolve, reject) => {
                    this.$validator.validateAll('step-1').then(result => {
                        if (result) {
                            if(!this.counterDanger) {
                                this.$vs.loading()
                                const bodyFormData = new FormData();
                                bodyFormData.append('user_id', localStorage.getItem('userId'))
                                bodyFormData.append('name', this.property_name)
                                bodyFormData.append('sname', this.property_short_name)
                                bodyFormData.append('language', this.Language);
                                bodyFormData.append('type', this.selectedCategory);
                                bodyFormData.append('sdescription', this.textarea);
                                bodyFormData.append('email', this.EmailEnter);
                                bodyFormData.append('hotel', Number(this.Hotel));
                                bodyFormData.append('logo', this.originalImage);
                                bodyFormData.append('aff', this.affiliated_by);
                                bodyFormData.append('app', this.approved_by);
                                bodyFormData.append('est', this.established_on);
                                bodyFormData.append('program', this.program_type);
                                bodyFormData.append('college', this.college_type);
                                axios.post('/api/properties/step1',bodyFormData)
                                    .then((res) => {
                                        console.log(res);
                                        if(res.data['success'] == 1){
                                            this.$vs.loading.close()
                                            this.currPropId = res.data['prop'];
                                            resolve(true)
                                            // this.getState()
                                            // this.getCity()
                                        }
                                    })
                                    .catch((err) => {
                                        reject("correct all values");
                                        this.$vs.loading.close()
                                        console.log(err)
                                    })
                                // resolve(true)
                            }else{
                                reject("correct all values");
                                this.alert('Words Limit Reached','Maximum Words Allowed are 100','red')
                            }
                        } else {
                            reject("correct all values");
                        }
                    })
                })
            },
            validateStep2() {
                return new Promise((resolve, reject) => {
                    this.$validator.validateAll("step-2").then(result => {
                        if (result) {
                            const bodyFormData = new FormData();
                            bodyFormData.append('description', this.textareaS);
                            bodyFormData.append('prop_id', this.currPropId);
                            bodyFormData.append('featured', this.originalImageF);
                            axios.post('/api/properties/step2',bodyFormData)
                                .then((res) => {
                                    console.log(res);
                                    if(res.data['success'] == 1){
                                        this.$vs.loading.close()
                                        // this.currPropId = res.data['prop'];
                                        resolve(true)
                                        // this.getState()
                                        // this.getCity()
                                    }
                                })
                                .catch((err) => {
                                    reject("correct all values");
                                    this.$vs.loading.close()
                                    console.log(err)
                                })
                        } else {
                            reject("correct all values");
                        }
                    })
                })
            },
            validateStep3() {
                return new Promise((resolve, reject) => {
                    this.$validator.validateAll("step-3").then(result => {
                        if(this.amenitiesValue.length == 0){
                            this.alert('Select at least one Category');
                            reject("correct all values");
                        }else {
                            if (result) {
                                this.$vs.loading()
                                axios.post('/api/properties/step3',
                                    {
                                        catg: this.amenitiesValue,
                                        prop_id: this.currPropId
                                    })
                                    .then((res) => {
                                        if (res.data['status'] == 1) {
                                            this.$vs.loading.close()
                                            resolve(true)
                                        }
                                    })
                                    .catch((err) => {
                                        reject("correct all values");
                                        console.log(err)
                                    })
                            } else {
                                reject("correct all values");
                            }
                        }
                    })
                })
            },
            validateStep4() {
                return new Promise((resolve, reject) => {
                    this.$validator.validateAll("step-4").then(result => {

                        if (result) {
                            this.$vs.loading()
                            axios.post('/api/properties/step4',
                                {
                                    prop_id: this.currPropId,
                                    local: this.local_area,
                                    national: this.nationality,
                                    pin: Number(this.pinCode),
                                    state: Number(this.stateSelect.id),
                                    city: Number(this.citySelect.id),
                                    address: this.addressValue
                                })
                                .then((res) => {
                                    if (res.data['success'] == 1) {
                                        this.$vs.loading.close()
                                        resolve(true);
                                        this.alert('College Added Successfully', 'Send to Admin for Approval', 'green');
                                        $('#fomrWizard').hide();
                                        $('#SuccessDone').show();
                                    }
                                })
                                .catch((err) => {
                                    this.$vs.loading.close();
                                    reject("correct all values");
                                    console.log(err)
                                })
                        } else {
                            reject("correct all values");
                        }
                    })
                })
            },

            galleryImage() {
                alert(this.gallery);
            },
            enableCity(){
                this.getCity()
            },
            getManagers() {
                axios.post('/api/users/managers')
                    .then((res) => {
                        console.log(res)
                        this.managers = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getAmen() {
                axios.post('/api/amenities/get')
                    .then((res) => {
                        console.log(res)
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
            showImage(e) {
                const file = e.target.files[0];
                this.originalImage = file;
                this.image = URL.createObjectURL(file);
            },
            showFeatured(e) {
                const file = e.target.files[0];
                this.originalImageF = file;
                this.featured = URL.createObjectURL(file);
            },
            getState() {
                axios.post('/api/state/get')
                    .then((res) => {
                        console.log(res)
                        this.stateOptions = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getCity() {
                axios.post('/api/city/get',{id:this.stateSelect.id})
                    .then((res) => {
                        this.cityOptions = [];
                        this.cityOptions = res.data;
                        this.disableC = false;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            resetGallery() {
                document.getElementById("galleryImage").value = "";
                this.images = [];
                this.selectedFiles = [];
            },
            deleteUpload(event) {
                console.log("Delete:" + JSON.stringify(event))
            },
            createRoom() {
                var room = $("#room_card").clone()
                var $div = $('.cloneDiv[id^="room_card"]:last');

                // Read the Number from that DIV's ID (i.e: 3 from "klon3")
                // And increment that number by 1
                var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

                // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
                var $klon = $div.clone().prop('id', 'room_card' + num);
                $("#copy_room").append($klon)
                $("html, body").animate({scrollTop: $(document).height()}, 1000);
            },
            successUpload(event) {
                console.log(event);
            },
            getPolicy() {
                axios.post('/api/policies/get')
                    .then((res) => {
                        console.log(res)
                        this.policyContent = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            removeMeal() {
                this.MealOption = [];
            },
            removeMealE() {
                this.MealOptionExclude = [];
            },
            removeRoom(elem) {
                alert("Clicked");
                alert($(elem).parent('div').attr('id'));
            },
            loadNum: function () {
                this.min = 0;
                this.max = 3;
                this.getRandomNumber();
            },
            getInput: function () {
                let min = Number(this.min)
                let max = Number(this.max)
                if (min > max) {
                    [min, max] = [max, min]
                }
                this.min = min
                this.max = max
                this.getRandomNumber()
            },
            onFileChange(e) {
                const file = e.target.files[0];
                this.selectedFeatured = file;
                this.url = URL.createObjectURL(file);
            },
            uploadImage(e) {
                let vm = this;
                var selectedFiles = e.target.files;
                for (let i = 0; i < selectedFiles.length; i++) {
                    console.log(selectedFiles[i]);
                    this.images.push(selectedFiles[i]);
                }

                for (let i = 0; i < this.images.length; i++) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        this.$refs.image[i].src = reader.result;

                        console.log(this.$refs.image[i].src);
                    };

                    reader.readAsDataURL(this.images[i]);
                }
            },
            getRandomNumber: function () {
                this.number = this.generateNumber()
            },
            generateNumber: function () {
                return Math.floor(Math.random() * (this.max - this.min + 1) + this.min);
            },
            alert(title, text, color) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: 'top-right'
                });
            },
            gotoList() {
                this.$router.push('/property/all').catch(() => {
                })
            },
            handleClick(e) {
                if (e.target.matches('.cloneButton, .cloneButton *')) {

                }
            }
        },
        components: {
            FormWizard,
            TabContent,
            quillEditor,
            'v-select': vSelect,
        },
        beforeMount() {
            this.getManagers()
            this.getAmen()
            this.getPolicy()
            this.getCat()
            this.getData()
        },
    }
</script>
