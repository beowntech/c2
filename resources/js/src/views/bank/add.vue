<style scoped>
    .con-input-upload{
        width: 120px !important;
        height: 120px !important;
    }
    .img-upload{
        width: 120px !important;
        height: 120px !important;
    }
</style>
<template>
    <div>
        <vx-card title="Add Bank">
            <form>
<!--                <img v-if="image" :src="reateObURL.cjectURL(image)" style="max-width: 40%">-->
                <input type="file" class="hidden" ref="uploadImgInput" name="image" @change="showImage"
                       accept="image/*" v-validate="'required'">
                <vs-button @click="$refs.uploadImgInput.click()">Upload Bank Image</vs-button>
                <br>
                <span class="text-danger text-sm"  v-show="errors.has('image')">{{ errors.first('image') }}</span>
                <div class="vx-row mt-4">
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <h6 class="mb-1">Name</h6>
                        <vs-input type="text" name="bank_name" style="width: 100%;" v-model="bank_name" v-validate="'required'" />
                        <span class="text-danger text-sm"  v-show="errors.has('bank_name')">{{ errors.first('bank_name') }}</span>
                    </div>
                    <div class="vx-col sm:w-1/4 w-full mb-2">
                        <h6 class="mb-1">Short Name</h6>
                        <vs-input style="width: 100%;" name="bank_short_name" v-model="bank_short_name" v-validate="'required'" />
                        <span class="text-danger text-sm"  v-show="errors.has('bank_short_name')">{{ errors.first('bank_short_name') }}</span>
                    </div>
                    <div class="vx-col sm:w-1/6 w-full mb-1">
                        <vs-checkbox class="mt-5" v-model="age_limit">Age Limit?</vs-checkbox>
                        <div v-if="age_limit">
                            <h6 class="mb-1" >Enter if Any</h6>
                            <vs-input style="width: 100%;" v-model="age_data" />
                        </div>
                    </div>
                    <div class="vx-col sm:w-1/5 w-full mb-1">
                        <vs-checkbox class="mt-5" v-model="tax_benefit">Tax Benefits?</vs-checkbox>
                        <div v-if="tax_benefit">
                            <h6 class="mb-1" >Enter if Any</h6>
                            <vs-input style="width: 100%;" v-model="tax_benefit_data" />
                        </div>
                    </div>
                </div>
                <div class="vx-row mt-3">
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="rate_of_interest" label="Applicable Rate of Interest" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="loan_security" label="Loan Security" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="penal_charges" label="Penal Charges" height="100" />
                    </div>
                </div>
                <div class="vx-row mt-3">
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="margin" label="Margin" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="max_loan_wc" label="Max Loan with Collateral" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="max_loan_woc" label="Max loan without collateral" height="100" />
                    </div>
                </div>
                <div class="vx-row mt-3">
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="processing_fee" label="Processing Fee" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="repayment_period" label="Repayment Period" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="loan_institution" label="Loan for Top Institution" height="100" />
                    </div>
                </div>
                <div class="vx-row mt-3">
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="eligibility_concession" label="Eligibility concession for SC/ST" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="prepayment_charges" label="Prepayment charges" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="bank_transfer" label="Bank transfter allowance" height="100" />
                    </div>
                </div>
                <div class="vx-row mt-3">
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="top_loan_availability" label="Top up loan availability" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="interest_schemes" label="Interest Subsidy Schemes" height="100" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2">
                        <vs-textarea v-model="concession_benefit" label="Concession/benefits" height="100" />
                    </div>
                </div>
                <div class="vx-row mt-4">
                    <div class="vx-col w-full mb-2">
                        <vs-button @click.prevent="addRoom" style="float: right;width: 15%;" >Submit</vs-button>
                    </div>
                </div>
            </form>
        </vx-card>
    </div>
</template>
<script>
    import axios from "axios";
    import Input from "../forms/form-elements/input/Input";
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    import vSelect from 'vue-select'
    import $ from 'jquery';

    // For custom error message
    import {Validator} from 'vee-validate';

    const dict = {
        custom: {
            image: {
                required: 'Logo is Required',
            },
            bank_name: {
                required: 'Bank Name is Required',
            },
            bank_short_name: {
                required: 'Short Name is Required',
            },
        }
    };

    // register custom messages
    Validator.localize('en', dict);

    export default {
        name: "add-room.vue",
        components: {Input, flatPickr,'v-select': vSelect,},
        data() {
            return {
                max_loan_woc: "",
                penal_charges: "",
                loan_security: "",
                processing_fee: "",
                rate_of_interest: "",
                repayment_period: "",
                loan_institution: "",
                max_loan_wc: "",
                eligibility_concession: "",
                prepayment_charges:"",
                bank_transfer: "",
                count: 1,
                age_limit: false,
                age_data: "",
                bank_name: "",
                bank_short_name: "",
                image: null,
                textarea: "",
                margin: "",
                tax_benefit: false,
                tax_benefit_data: "",
                concession_benefit: "",
                interest_schemes: "",
                top_loan_availability: "",
            }
        },
        methods:{
            submitForm() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        // if form have no errors
                        alert("form submitted!");
                    } else {
                        // form have errors
                    }
                })
            },
            addRoom(){
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let fd = new FormData();
                // fd.append("prop_id", localStorage.getItem('globalIns'));
                fd.append("name", this.bank_name);
                fd.append("short_name", this.bank_short_name);
                fd.append("age_limit", this.age_data);
                fd.append("tax_benefit", this.tax_benefit_data);
                fd.append("rate_of_interest", this.rate_of_interest);
                fd.append("loan_security", this.loan_security);
                fd.append("penal_charges", this.penal_charges);
                fd.append("margin", this.margin);
                fd.append("max_loan_collateral", this.max_loan_wc);
                fd.append("max_loan_w_collateral", this.max_loan_woc);
                fd.append("processing_fee", this.processing_fee);
                fd.append("repayment_period", this.repayment_period);
                fd.append("loan_for_top_inst", this.loan_institution);
                fd.append("eligibility_concession", this.eligibility_concession);
                fd.append("prepayment_charges", this.prepayment_charges);
                fd.append("bank_transfer", this.bank_transfer);
                fd.append("topup_loan", this.top_loan_availability);
                fd.append("insterest_subsidy_schemes", this.interest_schemes);
                fd.append("benefits", this.concession_benefit);
                fd.append("bank_type", 1);
                fd.append("image", this.image);
                // fd.append("file", this.file);

                axios.post('/api/bank/add',fd,config)
                    .then((res) => {
                        // this.textarea = res.data;
                        this.alert('Bank Added Successful','Bank Added Successfully Go Back to create New','success')
                        console.log(res.data);
                    })
                    .catch((err) => {
                        this.alert('There is some Problem Adding Bank','Check if any field is Not filled','danger')
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            alert(title, text, color) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: 'top-right'
                });
            },
            onFileChange(e){
                // console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            successUpload(e){
                this.originalImage = e.target.files[0];
            },
            showImage(e){
                this.image = e.target.files[0]
            },
            getCategories(){
                axios.post('/api/categories/course-catg')
                    .then((res) => {
                        this.categories = res.data;
                        // this.getStream()
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            getStream(){
                axios.post('/api/categories/course-stream',{
                    'id': this.selectedCatg.id,
                })
                    .then((res) => {
                        if(res.data != 0) {
                            $("#stream").show();
                            this.streams = res.data;
                        }else{
                            $("#stream").hide();
                        }
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            getSubStream(){
                axios.post('/api/categories/course-sub-stream',{
                    'id': this.selectedStream.id,
                })
                    .then((res) => {
                        if(res.data != 0) {
                            $("#substream").show();
                            this.substreams = res.data;
                        }else{
                            $("#substream").hide();
                        }
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
        },
        mounted() {
            this.getCategories();
        }
    }
</script>
<style>
    .vs__actions{
        display: none !important;
    }
</style>
