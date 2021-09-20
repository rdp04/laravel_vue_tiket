<template>
<div class="container">
     <v-form @submit.prevent="savetransaksi">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fas fa-money-check-alt"> TRANSAKSI TIKET </i></div>
                    <div class="card-body">
                    <h3><i class="fab fa-wpforms"> Form Transaksi </i></h3>
                    <table class="table table-bordered">
                           <tr><td>
                                <div class="col-md-12">
                                    <label>Name Tiket</label>
                                      <v-flex xs12 sm12 d-flex>
                                        <select class="form-control" v-model="form.id_tiket">
                                             <option v-for="tikets in tiket" :value="tikets.id">
                                            {{tikets.name_tiket}}
                                            </option>
                                        </select>
                                      </v-flex>
                                </div>
                           </td></tr>
                        <tr><td>
                                <div class="col-md-12">
                                    <label>Qty</label>
                                      <v-flex xs12 sm12 d-flex>
                                         <input  type="number" class="form-control" v-model="form.qty">
                                      </v-flex>
                                </div>
                         </td></tr>
                          <tr><td>
                                <v-btn color="primary" type="submit" dark> Save
                                    <v-icon color="orange">mdi-check</v-icon>
                                        <!-- <v-icon dark right>check_circle</v-icon> -->
                                </v-btn>
                                <v-btn color="primary" @click="finis()" dark> Finish
                                    <v-icon color="orange">mdi-check</v-icon>
                                        <!-- <v-icon dark right>check_circle</v-icon> -->
                                </v-btn>
                                    <v-btn @click="print()" color="indigo" dark>Print
                                    <v-icon color="orange">mdi-cloud-print </v-icon>
                                        <!-- <v-icon dark>backup</v-icon> -->
                                    </v-btn>
                            </td></tr>
                    </table>
                        <div class="card-header">
                           <i class="fab fa-wpforms"> Detail Transaksi </i>
                       </div>
                     <table class="table table-bordered">
                         <th>
                             <i class="fas fa-file-signature">  Nama Tiket </i>
                         </th>
                         <th>
                             <i class="fab fa-wolf-pack-battalion"> Qty </i></th>
                        <th>
                            <i class="fas fa-hand-holding-usd"> Harga Tiket </i>
                        </th>
                        <th>
                            <i class="fas fa-dollar-sign"> Subtotal  </i></th>
                            <th>
                                <!-- <i class="fas fa-ban"> Cancel </i> -->
                         </th>
                        <tr v-for="transaksis in transaksi" :key="transaksis.id">
                                <td>{{transaksis.name_tiket}}</td>
                                <td>{{transaksis.qty}}</td>
                                <td>{{transaksis.harga_tiket}}</td>
                                <td>{{transaksis.total}}</td>
                               <td>
                                     <v-btn icon small>
                                         <v-icon @click="cancel(transaksis.id)" color="orange">mdi-delete-forever</v-icon>
                                         <!-- <v-icon color="red">cancel</v-icon> -->
                                     </v-btn>
                               </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </v-form>
</div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                id_tiket:null,
                qty:null
            },
            tiket:{},
            transaksi:{}

        }
    },
    created(){
        axios.get("/api/tiket")
        .then(res=>this.tiket=res.data.data)
    },
    methods:{
        savetransaksi(){
            axios.post("/api/transaksi/store",this.form)
            .then((response)=>{
                this.getTransaksi()
            })
        },
        getTransaksi(){
            axios.get("/api/transaksi")
            .then(res=>this.transaksi=res.data.data)
        },
        cancel(id){
            axios.delete(`/api/transaksi/${id}+`)
            .then((response)=>{
                this.getTransaksi();
            })
        },
        finis(){
            axios.get(`api/transaksi/update`)
            .then((response)=>{
                this.getTransaksi()
            })
        }
    }
}
</script>