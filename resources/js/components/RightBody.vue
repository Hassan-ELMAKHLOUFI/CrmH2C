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
                                      <input type="checkbox" name="test" :checked="upcomingtask.completed" @change="checkedUpcoming(upcomingtask.id)"/>
                                      <span></span>
                                </label>
                                <h4>{{upcomingtask.title}}</h4>
                          </div>
                          <div class="right">
                              <img src="/images/edit.png" alt="">
                              <img src="/images/del.png" alt="" @click="delUpcoming(upcomingTask.id)">
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
            const newTask ={
                  "title":this.newTask,
                  "completed":false ,
                  "approved":false,
                  "waiting":true
            };
            fetch('api/upcoming' ,{
                  method:'POST',
                  header:{
                     "content-type":"application/json"},
                  body:JSON.stringify(newTask)
                  
            }).then(()=>{this.upcoming.push(newTask);console.log(newTask)});

            this.newTask=""
         },
         delUpcomingTask(){},

         checkedUpcoming(){},
         //Today Task method 
        fetchTodayTasks(){

        }
   }
}
</script>

<style>

</style>