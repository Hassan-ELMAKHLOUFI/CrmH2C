<template>
  <div id="right">

        <h1>Developement CRM </h1>
        <div class="horizontal">
              <img v-bind:src="horizontalImg">
        </div>

        <p>Lorem, ipsum dolor sit amet consectetur 
              adipisicing elit. Quaerat cumque facere, modi
              odio eveniet obcaecati rem. Natus, 
              quibusdam facere et ratione eum necessitatibus!
         </p>

  <div class="task">
        <div class="add-tasks">
              <h2>Today's Task</h2>

              <div class="add-action">
                        <img src="/images/add.png" alt="">
               </div>
        </div>
  <ul class="tasks-list"></ul> </div>
        <div class="upcoming">
            <div class="add-tasks">
                <h2>Upcoming</h2>
                <div class="add-action">
                      <img src="/images/add.png" alt="" srcset="">
                </div>
              </div>
 
                <form action="" @submit="addUpcomingTask">
                    <input type="text" v-model="newTask">  
                   
                </form>
    <table style="padding-top:50px!important;">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">dead line</th>
          <th scope="col">Action</th>
         
        </tr>
      </thead>
      <tbody>
        <tr v-for="upcomingtask in upcoming" v-bind:key="upcomingtask.id">
          <td scope="row" style="padding-top:10px;">  
                   <label class="myCheckbox">
                     <input 
                        type="checkbox" name="test" 
                        :checked="upcomingtask.completed"
                        @change="checkedUpcoming(upcomingtask.id)"/>
                                      
                                       <span></span>
                                </label>
            </td>
          <td style="padding-right:50px;">{{upcomingtask.title }}</td>
          <td style="padding-right:50px;">{{upcomingtask.deadline}}</td>
          <td> <img src="/images/del.png"  @click="delUpcoming(upcomingtask.id)"/>
               <img v-b-modal="upcomingtask.title" src="/images/edit.png"  alt="">  
          </td>
  
        </tr>
      </tbody>          
    </table>



  </div>

</div>
</template>

<script>
import ElTableDraggable from 'el-table-draggable'
export default {
          components: {
        ElTableDraggable
    },
   data:function(){
       return{
            horizontalImg:"/images/horizontal.png",
            todayTask:[],
            upcoming :[],
            newTask:"",
            updatedTask:"",
            token   : "",
            user:null


       };
       
   },

   created(){
      this.fetchTodayTasks();
      this.fetchUpcoming();

   },
   methods:{


         //Upcoming Task

         fetchUpcoming(){
               fetch('/api/upcoming')
               .then( (res) => res.json())
                .then(({data})=>{
                     console.log(data)
                  this.upcoming = data;

               } )
               .catch((err)=>console.log(err));
         },
         addUpcomingTask(e){
            e.preventDefault();
            const newTasks ={
                  title:this.newTask,
                  completed:false ,
                  approved:false,
                  waiting:true
            };
               axios.post('/api/upcoming',newTasks).then(()=>{this.upcoming.push(newTasks);})
          
 
     },

         delUpcoming(id){
               console.log(id)
            if(confirm("are you sure ?")){
                  axios.delete(`/api/upcoming/${id}`).then(() => {

                        this.upcoming=this.upcoming.filter(
                           ({ id:i })=> i !== id
                        );
                  }).catch((err)=> console.log(err))
            }
         },

         checkedUpcoming(id){
              console.log()
         },
         //Today Task method 
        fetchTodayTasks(){

        },
     editSchoolName (id, title) {
            return this.upcoming.map(item => {
                  
                  if (item.id === id) {
                        item.title = title;
                  }
                  return item;
            });
            },

        updateUpcomingTask(id){
            console.log(id);
            const updatedTasks ={
                  id:id,
                  title:document.getElementById('id'+id).value,
                  completed:false ,
                  approved:false,
                  waiting:true
            };
             axios.put('/api/upcoming',updatedTasks).then(()=>{
                  this.editSchoolName(id,document.getElementById('id'+id).value)
                  this.updatedTask=""})
        }

   },
   mounted(){
         axios.get('/api/user').then((res)=>{
               this.user=res.data
         })
   }
}
</script>

<style>
table {border: none!important;}
</style>