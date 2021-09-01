<template>
<div id="left">
    
     <img v-bind:src="hamburgerImg" alt="">
     <button @click.prevent="logout">logout</button>
     <div class="profile">
         <h1>Hi Hassan</h1>
         <h2> Let's make project more amazing</h2>
     </div>

    <div class="search">
        <input placeholder="search your project">
         <img v-bind:src="searchImg " >

    </div>

    <div class="project">
          <h3>Projects <span>(18)</span></h3>
     <div class="projects">
        <div class="a-project">
           <div class="box-color">
               <img v-bind:src="overlayImg" >
               <span>PT</span>
           </div>

           <h6>Developement</h6>
        </div>

         
         <div class="a-project">
           <div class="box-color">
                <img v-bind:src="overlayImg" >
               <span>RA</span>
           </div>

           <h6>Design</h6>
        </div>


         <div class="a-project">
           <div class="box-color">
                <img v-bind:src="overlayImg" >
               <span>TA</span>
           </div>

           <h6>Testing</h6>
        </div>


        <div class="a-project">
           <div class="box-color">
                <img v-bind:src="overlayImg" >
               <span>MD</span>
           </div>

           <h6>Meduim draft</h6>
        </div>
         <div class="a-project">
           <div class="box-color">
               <img v-bind:src="overlayImg" >
               <span>LP</span>
           </div>

           <h6>Landing Page</h6>
        </div>


       
        
         <div class="a-project">
           <div class="box-color">
               <img v-bind:src="plusImg" >
               <span>LP</span>
           </div>

           <h6>Add Project</h6>
        </div>
</div>

    </div>



</div>
</template>

<script>
import search from "/images/search.png"
export default {
    
  data:function(){
      return {
          searchImg:search,
          overlayImg:"../images/overlay.png",
          plusImg:"../images/plus.png",
          hamburgerImg:"../images/hamburger.png",       
      }    
  },
  methods:{
      logout(){
          axios.post('/api/logout').then(()=>{
              this.$router.push({name:'Home'});
          })
      }
  }
    }
</script>

<style lang="css">

</style> 