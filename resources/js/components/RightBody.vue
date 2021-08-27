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

        <ul class="tasks-list">
              <li v-for="upcomingtask in upcoming" v-bind:key="upcomingtask.id">
                    <div class="info">
                          <div class="left">
                               <label class="myCheckbox">
                                      <input 
                                      type="checkbox" name="test" 
                                      :checked="upcomingtask.completed"
                                       @change="checkedUpcoming(upcomingtask.id)"
                                       />
                                      
                                       <span></span>
                                </label>
                                <h4>{{upcomingtask.title}}</h4>
                          </div>
                          
                          <div class="right">
                              <img v-b-modal="upcomingtask.title" src="/images/edit.png"  alt="">

                              <b-modal :id="upcomingtask.title" title="BootstrapVue">
                             
                                    <input type="hidden" :name="'id'+upcomingtask.id" :value='upcomingtask.id'/>
        
                                    <input type="text" :id="'id'+upcomingtask.id"  :value="upcomingtask.title" />
                              <template #modal-footer>
                                          <b>Custom Footer</b>
                                          <!-- Emulate built in modal footer ok and cancel button actions -->
                                          <b-button size="sm" variant="success" @click="updateUpcomingTask(upcomingtask.id)">
                                          update
                                          </b-button>
                
             
                                    </template>
                              </b-modal>
                              <img src="/images/del.png"  @click="delUpcoming(upcomingtask.id)"/>
                              
                          </div>
                    </div>
              </li>
        </ul>
  </div>

</div>
</template>

<script>
export default {
   data:function(){
       return{
            horizontalImg:"/images/horizontal.png",
            todayTask:[],
            upcoming :[],
            newTask:"",
            updatedTask:""

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
            fetch('/api/upcoming' ,{
                  method:'POST',
                  header:{
                     'Accept': 'application/json',
                     "content-type" : "application/json"
                     },
                  body:JSON.stringify(newTasks)})
                
      .then(()=>{this.upcoming.push(newTasks);})
     },

         delUpcoming(id){
               console.log(id)
            if(confirm("are you sure ?")){
                  fetch(`/api/upcoming/${id}`,{
                        method:'delete',
                  })
                  .then(() => {

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
            fetch('/api/upcoming' ,{
                  method:'PUT',
                  header:{
                     'Accept': 'application/json',
                     "content-type" : "application/json"
                     },
                  body:JSON.stringify(updatedTasks)})
                
      .then(()=>{
                  this.editSchoolName(id,document.getElementById('id'+id).value)
                  this.updatedTask=""})
        }

   }
}
</script>

<style>

</style>