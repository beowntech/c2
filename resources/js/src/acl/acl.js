import Vue from "vue"
import {AclInstaller, AclCreate, AclRule} from "vue-acl"
import router from "@/router"

Vue.use(AclInstaller)

let initialRole = "";
if (localStorage.getItem("userRole") != null && localStorage.getItem("userRole") != "") {
    initialRole = localStorage.getItem("userRole").toLowerCase()
} else {
    initialRole = "admin"
}

// let userInfo = JSON.parse(localStorage.getItem("userRole"))
// if(userInfo && userInfo.userRole)
//     initialRole = localStorage.getItem("userRole");

export default new AclCreate({
    initial: initialRole,
    notfound: "/pages/not-authorized",
    router,
    acceptLocalRules: true,
    globalRules: {
        prop: new AclRule("sadmin").or("editor").generate(),
        call: new AclRule("sadmin").or("caller").generate(),
        calladmin: new AclRule("sadmin").or("caller").or("admin").generate(),
        admin: new AclRule("admin").generate(),
        editor: new AclRule("editor").generate(),
        manager: new AclRule("manager").or("admin").generate(),
        caller: new AclRule("caller").generate(),
        blogger: new AclRule("blogger").generate(),
        sadmin: new AclRule("sadmin").generate(),
        all: new AclRule("admin").or("sadmin").or("manager").or("blogger").or('editor').or('caller').generate(),
    },
    // middleware: async acl => {
    //     await timeout(500) // call your api
    //     this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: localStorage.getItem("userRole").toLowerCase()})
    //     // acl.change(localStorage.getItem("userRole"))
    // }
})
