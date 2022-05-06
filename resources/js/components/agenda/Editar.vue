<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Agenda</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <input type="text" class="form-control" v-model="agendas.titulo">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Comenta" id="txtArea" style="height: 100px" v-model="agendas.contenido"></textarea>
                                    <label for="txtArea">Contenido</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" v-model="agendas.dia">
                                        <option disabled selected>Seleccionar</option>
                                        <option v-for="dia in dias" :key="dia.dia">{{ dia.dia }}</option>
                                    </select>
                                    <label for="floatingSelect">Dia</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect1" v-model="agendas.idCategoria">
                                        <option value="" disabled>Selecciona</option>
                                        <option :value="category.categories_id" v-for="category in categories" :key="category.categories_id">{{ category.categories_nom }}</option>
                                    </select>
                                    <label for="floatingSelect1">Categoria</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editar-agendas",
    data(){
        return {
            agendas:{
                titulo:"",
                contenido:"",
                dia:"",
                idCategoria:""
            },
            categories:[],
            dias:[
                {dia: 'Lunes'},
                {dia: 'Martes'},
                {dia: 'Miercoles'},
                {dia: 'Jueves'},
                {dia: 'Viernes'},
                {dia: 'Sabado'},
                {dia: 'Domingo'},
            ]
        }
    },
    mounted(){
        this.editarAgenda()
    },
    methods:{
        async editarAgenda(){
            await this.axios.get(`/api/task/${this.$route.params.id}`).then(response=>{
                const { task_titulo, task_content, task_day, categories_id } = response.data[0]
                this.agendas.titulo = task_titulo
                this.agendas.contenido = task_content
                this.agendas.dia = task_day
                this.agendas.idCategoria = categories_id
                
            }).catch(error=>{
                console.log(error)
            })
            // Datos Select
            await this.axios.get('/api/categories').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        async actualizar(){
            await this.axios.put(`/api/task/${this.$route.params.id}`,this.agendas).then(response=>{
                this.$router.push({name:"mostrarAgenda"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>