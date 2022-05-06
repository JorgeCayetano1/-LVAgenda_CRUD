const Home = ()=> import('./components/Home.vue');
const Contacto = ()=> import('./components/Contacto.vue');

//importamos componentes para categoria
const MostrarCategoria = ()=> import('./components/category/Mostrar.vue');
const CrearCategoria = ()=> import('./components/category/Crear.vue');
const EditarCategoria = ()=> import('./components/category/Editar.vue');

//componentes agenda
const MostrarAgenda = ()=> import('./components/agenda/Mostrar.vue');
const CrearAgenda = ()=> import('./components/agenda/Crear.vue');
const EditarAgenda = ()=> import('./components/agenda/Editar.vue');

// Sintaxis Vue V2
// export const routes = [{}];

export const routes = [
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        name:'contacto',
        path:'/contacto',
        component:Contacto
    },
    // COMPONENTES CATEGORIA
    {
        name:'mostrarCategories',
        path:'/categories',
        component:MostrarCategoria
    },
    {
        name:'crearCategory',
        path:'/crear',
        component:CrearCategoria
    },
    {
        name:'editarCategory',
        path:'/editar/:id',
        component:EditarCategoria
    },
    // COMPONENTES AGENDA
    {
        name:'mostrarAgenda',
        path:'/agendas',
        component:MostrarAgenda
    },
    {
        name:'crearAgenda',
        path:'/crear',
        component:CrearAgenda
    },
    {
        name:'editarAgenda',
        path:'/editar/:id',
        component:EditarAgenda
    },
];

//Sintaxis vue V3
//export default routes;