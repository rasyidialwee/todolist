<template>
  <div>
    <span class="p-float-label">
      <InputText type="text" v-model="form.name" />
      <label for="username">Name</label>
    </span>
    <span class="p-float-label">
      <InputText type="text" v-model="form.description" />
      <label for="username">Description</label>
    </span>
    <Button label="Save" @click="submit" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        description: "",
      },
    };
  },
  methods: {
    submit() {
      console.log("aa", this.form);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
