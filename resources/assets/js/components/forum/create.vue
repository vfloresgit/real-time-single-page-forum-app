<template>
 <v-container>
      <v-form @submit.prevent="create">
    <v-container>
      <v-layout>
        <v-flex
          xs12
          md4
        >
          <v-text-field
             label="Title"
            v-model="form.title"         
            type= "text"
            required
          ></v-text-field>

          <v-select
          :items="categories"
          item-text="name"
          item-value="id"
          v-model="form.category_id"
          label="Category"
        ></v-select>

        <markdown-editor v-model="form.body"></markdown-editor>

          <v-btn color="green" type="submit">
              Create
          </v-btn>

        </v-flex>
      </v-layout>
    </v-container>
  </v-form>
 </v-container>
</template>

<script>
export default {
    data(){
         return {
             form:{
                 title:null,
                 category_id:null,
                 body:null

             },
             categories:{},
             errors:{}
         }
    },
    created(){
       axios.get('/api/category')
       .then(res => this.categories = res.data.data)
    },
    methods:{
        create(){
            axios.post('/api/question',this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => this.errors = error.response.data.error)
        }
    }
    
}
</script>

<style>

  @import '~simplemde/dist/simplemde.min.css';

</style>
