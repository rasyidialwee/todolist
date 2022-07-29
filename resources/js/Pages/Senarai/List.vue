<template>
  <div>
    <table class="w-full">
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="senarai in senarais" :key="senarai.id">
          <td>{{ senarai.name }}</td>
          <td>{{ senarai.description }}</td>
          <td>
            <Link :href="route('senarai.show', senarai.id)">
              <Button label="View" class="p-button-info" />
            </Link>

            <Button
              label="Edit"
              @click="this.$emit('edit', senarai)"
              class="p-button-warning"
            />
            <Button
              label="Delete"
              @click="deleteSenarai(senarai)"
              class="p-button-danger"
            />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  props: {
    senarais: {
      type: Array,
      required: true,
    },
  },
  methods: {
    deleteSenarai(senarai) {
      console.log("nak delete", senarai);

      axios
        .delete(route("senarai.delete", senarai.id))
        .then((resp) => {
          console.log("delete");

          let deleted = this.senarais.findIndex(
            (_senarai) => _senarai.id === senarai.id
          );

          this.senarais.splice(deleted, 1);
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
