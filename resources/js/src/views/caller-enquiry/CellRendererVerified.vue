<template>
    <div>{{convert}}</div>
</template>

<script>
    export default {
        name: 'CellRendererVerified',
        computed: {
          convert() {
              if(this.params.value == null){
                  return "No Value";
              }else {
                  let json = "";
                  let name = JSON.parse(this.params.value);
                  for (let i = 0; i < name.length; i++) {
                      json += name[i] + ", ";
                  }
                  return json;
              }
          }
        },
    }
</script>
