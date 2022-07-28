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
            <Button
              label="Edit"
              @click="this.$emit('edit', senarai)"
              class="p-button-warning"
            />
            <Button label="Delete" class="p-button-danger" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    senarais: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
