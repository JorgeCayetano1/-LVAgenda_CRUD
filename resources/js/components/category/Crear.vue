<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Categoria</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" v-model="category.categories_nom">
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
    name:"crear-categoria",
    data(){
        return {
            category:{
                categories_nom:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/categories',this.category).then(response=>{
                this.$router.push({name:"mostrarCategories"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>