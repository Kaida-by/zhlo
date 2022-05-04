<template>
  <div>
    <div>
      <h2>{{ article.title }}</h2>
      <p>{{ article.description }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data:() => ({
    article: {},
  }),
  created() {
    this.getArticle()
  },
  methods: {
    getArticle() {
      this.$axios.get('/article/' + this.$route.params.id)
      .then((response) => {
        this.article = response.data.article
      })
      .catch((error) => {
        console.log(error)
      })
    }
  }
}
</script>

<style scoped>

</style>
