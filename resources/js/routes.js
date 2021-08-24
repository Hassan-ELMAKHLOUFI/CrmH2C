import project from './components/project';
 import task from './components/task';
import client from './components/client';

export default{
    mode: 'history',
    linkActiveClass: 'font-semibold',
    routes: [
   
        {
            path: '/project',
            component: project,
            name: "project"
        },
        {
            path: '/task',
            component: task,
            name:"task"
        },
        {
            path: '/client',
            component: client,
            name:"client"
        }
          
    ]
}