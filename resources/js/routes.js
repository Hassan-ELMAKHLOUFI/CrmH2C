import project from './components/project';
 import task from './components/task';
import client from './components/client';
import Home from './components/Home';
import login from './components/login';
import register from './components/register';
import axios from 'axios';
export default{
    mode: 'history',
    linkActiveClass: 'font-semibold',
    routes: [

        {
            path: '/register',
            component: register,
            name: "register"
        }, 
        

        {
            path: '/login',
            component: login,
            name: "login"
        }, 

        {
            path: '/',
            component: Home,
            name: "Home"
        },
   
        {
            path: '/project',
            component: project,
            name: "project"
        },
        {
            path: '/task',
            component: task,
            name:"task",
            beforeEnter:(to,form,next)=>{
                axios.get('/api/authenticated').then(()=>{
                    next()
                }).catch(()=>{
                    return next({name:'login'})
                })
            }
        },
        {
            path: '/client',
            component: client,
            name:"client"
        }
          
    ]
}