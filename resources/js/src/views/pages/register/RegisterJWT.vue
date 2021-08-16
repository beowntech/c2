<!-- =========================================================================================
File Name: RegisterJWT.vue
Description: Register Page for JWT
----------------------------------------------------------------------------------------
Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
  <div class="clearfix" v-if="OTP == null">
    <vs-input
      v-validate="'required|alpha_dash|min:3'"
      data-vv-validate-on="blur"
      label-placeholder="Name"
      name="Name"
      placeholder="Name"
      v-model="displayName"
      class="w-full" />
    <span class="text-danger text-sm">{{ errors.first('Name') }}</span>

    <vs-input
      v-validate="'required|email'"
      data-vv-validate-on="blur"
      name="email"
      type="email"
      label-placeholder="Email"
      placeholder="Email"
      v-model="email"
      class="w-full mt-6" />
    <span class="text-danger text-sm">{{ errors.first('email') }}</span>

      <vs-input
          v-validate="'required|min:10|max:10'"
          data-vv-validate-on="blur"
          label-placeholder="Contact No."
          name="Contact"
          placeholder="Contact No."
          v-model="contactNo"
          class="w-full mt-6" />
      <span class="text-danger text-sm">{{ errors.first('Contact') }}</span>

    <vs-input
      ref="password"
      type="password"
      data-vv-validate-on="blur"
      v-validate="'required|min:6|max:10'"
      name="password"
      label-placeholder="Password"
      placeholder="Password"
      v-model="password"
      class="w-full mt-6" />
    <span class="text-danger text-sm">{{ errors.first('password') }}</span>

    <vs-input
      type="password"
      v-validate="'min:6|max:10|confirmed:password'"
      data-vv-validate-on="blur"
      data-vv-as="password"
      name="confirm_password"
      label-placeholder="Confirm Password"
      placeholder="Confirm Password"
      v-model="confirm_password"
      class="w-full mt-6" />
    <span class="text-danger text-sm">{{ errors.first('confirm_password') }}</span>

    <vs-checkbox v-model="isTermsConditionAccepted" class="mt-6">I accept the terms & conditions.</vs-checkbox>
    <vs-button  type="border" to="/login" class="mt-6">Login</vs-button>
    <vs-button class="float-right mt-6" @click="registerUserJWt" :disabled="!validateForm">Register</vs-button>
  </div>
    <div class="clearfix" v-else>
        <vs-input
            v-validate="'required|min:6|max:6'"
            data-vv-validate-on="blur"
            label-placeholder="OTP"
            name="OTP"
            placeholder="OTP"
            v-model="OTPPIN"
            class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('OTP') }}</span>

        <vs-button  type="border" @click="submitPin" class="mt-6">Submit</vs-button>
    </div>
</template>

<script>
import axios from "axios";
import router from "vue-router";

export default {
    data() {
        return {
            displayName: '',
            contactNo: '',
            email: '',
            OTP: null,
            OTPPIN: '',
            password: '',
            confirm_password: '',
            isTermsConditionAccepted: true
        }
    },
    computed: {
        validateForm() {
            return !this.errors.any() && this.displayName != '' && this.email != '' && this.contactNo != '' && this.password != '' && this.confirm_password != '' && this.isTermsConditionAccepted === true;
        }
    },
    methods: {
        checkLogin() {
          // If user is already logged in notify
          if(this.$store.state.auth.isUserLoggedIn()) {

            // Close animation if passed as payload
            // this.$vs.loading.close()

            this.$vs.notify({
              title: 'Login Attempt',
              text: 'You are already logged in!',
              iconPack: 'feather',
              icon: 'icon-alert-circle',
              color: 'warning'
            })

            return false
          }
          return true
        },
        registerUserJWt() {

            if (!this.checkLogin()) return

            // Loading
            this.$vs.loading()

            axios.post('/api/register',
                {
                    email:this.email,
                    password:this.password,
                    contact:this.contactNo,
                    name:this.displayName,
                })
                .then((res) => {
                    console.log(res.data);
                    if(res.data['success'] == 1) {
                        this.user_id = res.data['user'];
                        this.$vs.loading.close();
                        this.OTP = 1;
                    }
                    this.$vs.loading.close();
                })
                .catch((err) => {
                    console.log(err)
                })
        },
        submitPin(){
            this.$vs.loading()
            axios.post('/api/register/confirmPin',
                {
                    userID:this.user_id,
                    pin:this.OTPPIN,
                })
                .then((res) => {
                    console.log(res.data);
                    if(res.data == 1) {
                        // this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: ""})
                        localStorage.setItem('usertoken', res.data.token)
                        this.email = ''
                        this.password = ''
                        this.$router.push({name: 'page-login'})
                        this.$vs.loading.close();
                    }else{
                        this.$vs.loading.close();
                    }

                })
                .catch((err) => {
                    this.$vs.loading.close();
                    console.log(err)
                })
        }
    }
}
</script>
