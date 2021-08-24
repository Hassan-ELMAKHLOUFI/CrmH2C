<template>
  <div class="Right">
        <h1>Developement CRM </h1>
        <div class="horizontal">
              <img v-bind:src="horizontalImg">
        </div>


  </div>
</template>

<script>
export default {
   data:function(){
       return{
            horizontalImg:"/images/horizontal.png",
            edit:"../images/grid.png"

       }
       
   }
}
</script>

<style>

</style>