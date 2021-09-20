  <template>
  <v-card>
        <router-link to="/tiket/create" class="btn btn-primary btn-sm float-right"> + Add Tiket</router-link>
  <v-card-title>
      Data Tiket
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
      :items="tiket"
      :search="search"
      class="elevation-1"
    >
      <template slot="item" slot-scope="tiket">
        <tr>
        <td>{{ tiket.item.name_tiket }}</td>
        <td>{{ tiket.item.harga_tiket }}</td>
        <td>{{ tiket.item.name_categori }}</td>
        <td>{{ tiket.item.jumlah_tiket }}</td>
        <td>
          <router-link :to="{name:'edittiket', params:{id:tiket.item.id}}">
                <v-icon color="orange">mdi-pencil</v-icon>
          </router-link>
            <v-btn icon small @click="destroy(tiket.item.id)">
                    <v-icon color="red">mdi-delete</v-icon>
            </v-btn>
          </td>

        </tr>
      </template>
      <v-alert slot="no-results" :value="true" color="red" icon="warning">
        Your search for "{{ search }}" found no results.
      </v-alert>
    </v-data-table>
  </v-card>
</template>
<script>
export default {
     data () {
      return {
        search: '',
        headers: [
          { text: 'Name tiket', value: 'name_tiket' },
          { text: 'Harga tiket', value: 'harga_tiket' },
          { text: 'Name category', value: 'name_categori' },
          { text: 'Jumlah tiket', value: 'jumlah_tiket' },
          { text: 'aksi', value: 'jumlah_tiket' },
        ],
        tiket: [ ]
      }
    },
    created(){
        this.getTiket()
    },
    methods:{
        getTiket(){
            axios.get("api/tiket")
            .then(res=>this.tiket=res.data.data)
        },
        destroy(id){
            axios.delete(`/api/tiket/${id}+`)
            this.getTiket()
        }
    }
}
</script>

<style>

</style>