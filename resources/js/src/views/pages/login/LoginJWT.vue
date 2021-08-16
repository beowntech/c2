<template>
  <div>
    <vs-input
        v-validate="'required|email|min:3'"
        data-vv-validate-on="blur"
        name="email"
        icon-no-border
        icon="icon icon-user"
        icon-pack="feather"
        label-placeholder="Email"
        v-model="email"
        @keyup.enter="loginJWT"
        class="w-full"/>
    <span class="text-danger text-sm">{{ errors.first('email') }}</span>

    <vs-input
        data-vv-validate-on="blur"
        v-validate="'required|min:6|max:10'"
        type="password"
        name="password"
        icon-no-border
        icon="icon icon-lock"
        icon-pack="feather"
        label-placeholder="Password"
        v-model="password"
        @keyup.enter="loginJWT"
        class="w-full mt-6" />
    <span class="text-danger text-sm">{{ errors.first('password') }}</span>

    <div class="flex flex-wrap justify-between my-5">
        <vs-checkbox v-model="checkbox_remember_me" class="mb-3">Remember Me</vs-checkbox>
        <router-link to="/pages/forgot-password">Forgot Password?</router-link>
    </div>
    <div class="flex flex-wrap justify-between mb-3">
      <vs-button  type="border" @click="registerUser">Register</vs-button>
      <vs-button :disabled="!validateForm" @click="loginJWT">Login</vs-button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import router from "vue-router";

export default {
  data() {
    return {
      email: '',
      password: '',
      checkbox_remember_me: false,
        token: localStorage.getItem("usertoken")
    }
  },
  computed: {
    validateForm() {
      return !this.errors.any() && this.email != '' && this.password != '';
    },
  },
  methods: {
    checkLogin() {

        axios.get('/api/profile',
            {
                headers:{
                    Authorization: 'Bearer'+this.token+''
                }
            })
            .then((res) => {
                if(res.data[0] == "token_expired"){
                    this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: 'admin'})
                    this.$router.push('/login').catch(() => {})
                    localStorage.removeItem("usertoken")
                    localStorage.removeItem("userRole")
                    // this.activePrompt = true;
                    this.$router.push({ name: 'page-login' })
                }
            })
            .catch((err) => {
                console.log(err)
            })

      // If user is already logged in notify
      // if (localStorage.getItem('usertoken')) {
      //
      //   // Close animation if passed as payload
      //   // this.$vs.loading.close()
      //
      //   this.$vs.notify({
      //     title: 'Already Logged In!',
      //     text: 'You are already logged in!',
      //     iconPack: 'feather',
      //     icon: 'icon-alert-circle',
      //     color: 'warning'
      //   })
      // //
      // //   return false
      //     this.$router.push({ name: 'dashboard-analytics'})
      // }
      return true
    },
    loginJWT() {

      if (!this.checkLogin()) return

      // Loading
            this.$vs.loading()

            axios.post('/api/login',
                {
                    email: this.email,
                    password: this.password,
                })
                .then((res) => {
                    console.log(res.data);
                    if(res.data['status'] == 2){
                        this.alert('User Does Not Exist','User with this Email Does not Exist','red')
                    }else {
                        localStorage.setItem('userId', JSON.stringify(res.data.user.id))
                        // this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: ""})
                        localStorage.setItem('usertoken', res.data.token)
                        this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: res.data.user.roles[0].name.toLowerCase()})
                        localStorage.setItem('userRole', res.data.user.roles[0].name.toLowerCase());
                        this.email = ''
                        this.password = ''
                        this.$router.push({name: 'dashboard-ecommerce'})
                    }
                    this.$vs.loading.close();
                })
                .catch((err) => {
                    this.alert('Check Email & Password','Email or Password Entered is Incorrect','red')
                    this.$vs.loading.close();
                    console.log(err)
                })
            this.emitMethod()
    },
    alert(title,text,color){
        this.$vs.notify({
            color: color,
            title: title,
            text: text,
            position:'top-right'
        });
    },
    registerUser() {
      if (!this.checkLogin()) return
      this.$router.push('/pages/register').catch(() => {})
    }
  },
    beforeMount(){
        this.checkLogin()
        console.log(JSON.parse(localStorage.getItem("userInfo")))
    }
}

</script>

