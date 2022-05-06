<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Agenda</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <input type="text" class="form-control" v-model="agenda.titulo">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Comenta" id="txtArea" style="height: 100px" v-model="agenda.contenido"></textarea>
                                    <label for="txtArea">Contenido</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" v-model="agenda.dia">
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option v-for="dia in dias" :key="dia.dia">{{ dia.dia }}</option>
                                    </select>
                                    <label for="floatingSelect">Dia</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect1" v-model="agenda.idCategoria">
                                        <option value="" disabled selected>Selecciona</option>
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
    name:"crear-agenda",
    data(){
        return {
            agenda:{
                titulo:"",
                contenido:"",
                dia:"",
                idCategoria:"",
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
        this.showSelect()
    },
    methods:{
        async showSelect(){
            // Datos Select
            await this.axios.get('/api/categories').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        async crear(){
            await this.axios.post('/api/task',this.agenda).then(response=>{
                this.$router.push({name:"mostrarAgenda"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>