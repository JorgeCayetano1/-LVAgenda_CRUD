<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearAgenda"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>TITULO</th>
                                    <th>CONTENIDO</th>
                                    <th>DIA</th>
                                    <th>CATEGORIA</th>
                                    <th>Creado el</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="agenda in agendas" :key="agenda.task_id">
                                    <td>{{ agenda.task_id }}</td>
                                    <td>{{ agenda.task_titulo }}</td>
                                    <td>{{ agenda.task_content }}</td>
                                    <td>{{ agenda.task_day }}</td>
                                    <td>{{ agenda.categories_nom }}</td>
                                    <td>{{ agenda.created_at }}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarAgenda",params:{id:agenda.task_id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarAgenda(agenda.task_id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"agendas",
    data(){
        return {
            agendas:[]
        }
    },
    mounted(){
        this.mostrarAgendas()
    },
    methods:{
        async mostrarAgendas(){
            await this.axios.get('/api/task').then(response=>{
                this.agendas = response.data
            }).catch(error=>{
                console.log(error)
                this.agendas = []
            })
        },
        borrarAgenda(id){
            if(confirm("¿Confirma eliminar la agenda?")){
                this.axios.delete(`/api/task/${id}`).then(response=>{
                    this.mostrarAgendas()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>