import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';

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

        // INFINE SI METTE QUESTA, PER DEFINIRE SE NON è STATA TROVATA LA ROTTA
		{
			path:'/*',
			
			name: 'notFound',
	
			component: NotFoundComponent
		},
    ]
});

export default router;