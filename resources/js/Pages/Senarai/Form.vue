<template>
  <div>
    <span class="p-float-label">
      <InputText type="text" v-model="form.name" maxlength="10" />
      <label for="username">Name</label>

      <div v-if="errors.name">
        <div v-if="errors.name.length > 0">
          <p v-for="(err, i) in errors.name" :key="i" class="text-red-400">
            {{ err }}
          </p>
        </div>
      </div>
    </span>
    <span class="p-float-label">
      <InputText type="text" v-model="form.description" />
      <label for="username">Description</label>
      <div v-if="errors.description">
        <div v-if="errors.description.length > 0">
          <p
            v-for="(err, i) in errors.description"
            :key="i"
            class="text-red-400"
          >
            {{ err }}
          </p>
        </div>
      </div>
    </span>
    <Button label="Save" @click="submit" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      form: {
        name: "",
        description: "",
      },
    };
  },
  methods: {
    submit() {
      axios
        .post(route("senarai.store"), this.form)
        .then((resp) => {
          console.log("resp", resp);
          this.$emit("saved", resp.data);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        })
        .then(() => {});
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
