<template>
  <div class="container">
    <div>
      <h1 class="title">
        {{ data }}
      </h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: ''
    }
  },
  mounted() {
    this.$axios
      .get('test')
      .then(response => {
        this.data = response.data.data
        console.log(response.data.data)
      }).catch(err => {
      console.log(err)
    })

  }
}
</script>
