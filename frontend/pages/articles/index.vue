<template>
  <div>
    <div v-for="article in articles" :key="article.id">
      <h3>
        <NuxtLink :to="`/articles/${article.id}`">{{ article.title }}</NuxtLink>
      </h3>
      <p>{{ article.description }}</p>

    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      articles: ''
    }
  },
  mounted() {
    this.$axios
      .get('articles')
      .then(response => {
        this.articles = response.data
      })
  }
}
</script>

<style scoped>

</style>
