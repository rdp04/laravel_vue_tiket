<template>
  <v-card>
      <router-link to="/categori/create" class="btn btn-primary btn-sm float-right">Add Categori</router-link>
    <v-card-title>
      Categori
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon=mdi-magnify
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="categories"
      :search="search"
      :items-per-page="5"
      class="elevation-1"
      :hide-default-footer="false"
    >
        <template slot="item" slot-scope="categories">
            <tr>
                <td>{{categories.item.name_categori}}</td>
                <td>
                    <router-link :to="{name:'editcategori',params:{id:categories.item.id}}">
                        <v-icon color="orange">mdi-pencil</v-icon>
                    </router-link>
                    <v-btn icon small @click="destroy(categories.item.id)">
                        <v-icon color="orange">mdi-delete</v-icon>
                    </v-btn>
                </td>
            </tr>
        </template>

       <v-alert
       slot="no-results"
       :value="true"
        color="#2A3B4D"
        dark
        icon="mdi-firework"
        dense
        >
        Your search for <strong>"{{search}}"</strong>  found no results.
        </v-alert>
    </v-data-table>
  </v-card>
</template>

<script>
  export default {
    mounted(){
        this.getCategori()
    },
    data () {
      return {
        search: '',
        headers: [
          {text: 'Name Categori', value: 'name_categori'},
          { text: 'Action', value: '' },
        ],
        categories: [],
      }
    },
    methods:{
        getCategori(){
            axios("/api/categori")
            .then(res=>this.categories=res.data.data)
            .catch(res=>console.log(error.res.data.data))
        },
        destroy(id){
            let konfirmasi=confirm(`Apakah Anda Yakin Menghapus Data?`)
            if(konfirmasi == true){
                axios.delete(`/api/categori/${id} +`)
                this.getCategori()

            }
        }
    },
    
  }
</script>