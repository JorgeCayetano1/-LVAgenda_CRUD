<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Blog</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" v-model="categories.nombre">
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
    name:"editar-categories",
    data(){
        return {
            categories:{
                nombre:"",
            }
        }
    },
    mounted(){
        this.mostrarCategory()
    },
    methods:{
        async mostrarCategory(){
            await this.axios.get(`/api/categories/${this.$route.params.id}`).then(response=>{
                const { categories_nom } = response.data[0]
                this.categories.nombre = categories_nom

                
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/categories/${this.$route.params.id}`,this.categories).then(response=>{
                this.$router.push({name:"mostrarCategories"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>