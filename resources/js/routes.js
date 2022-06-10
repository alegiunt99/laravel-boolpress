import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';

import BlogComponent from './pages/BlogComponent';

import NotFoundComponent from './pages/NotFoundComponent';
const router = new VueRouter({
	
    mode: 'history',
    
    routes: [

    // collegamento alla Home 
        {
            path:'/',
            
            name: 'home',

            component: HomeComponent
        },

        // collegamento al blog con la lista dei post 
        {
            path:'/blog',
            
            name: 'blog',

            component: BlogComponent
        },
        
        // INFINE SI METTE QUESTA, PER DEFINIRE SE NON è STATA TROVATA LA ROTTA
		{
			path:'/*',
			
			name: 'notFound',
	
			component: NotFoundComponent
		},
    ]
});

export default router;