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
    <Button
      v-if="senarai !== null"
      :label="isLoading ? '...loading' : 'Update'"
      :disabled="isLoading"
      @click="submit"
    />
    <Button
      v-else
      :label="isLoading ? '...loading' : 'Save'"
      :disabled="isLoading"
      @click="submit"
    />
  </div>
</template>

<script>
export default {
  props: {
    senarai: {
      default: null,
      type: Object,
    },
  },
  data() {
    return {
      isLoading: false,
      errors: [],
      form: {
        name: "",
        description: "",
      },
    };
  },
  methods: {
    save() {
      axios
        .post(route("senarai.store"), this.form)
        .then((resp) => {
          this.$emit("saved", resp.data);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        })
        .then(() => {
          this.isLoading = false;
        });
    },
    update() {
      axios
        .post(route("senarai.update", this.senarai.id), this.form)
        .then((resp) => {
          console.log("resp", resp);
          this.$emit("updated", resp.data);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        })
        .then(() => {
          this.isLoading = false;
        });
    },
    submit() {
      this.isLoading = true;

      this.senarai !== null ? this.update() : this.save();
      //   same as above
      //   if (this.senarai !== null) {
      //     this.update;
      //   } else {
      //     this.save;
      //   }
    },
  },
  mounted() {
    if (this.senarai !== null) {
      this.form.name = this.senarai.name;
      this.form.description = this.senarai.description;
    }
  },
};
</script>

<style lang="scss" scoped>
</style>
