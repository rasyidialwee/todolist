<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import List from "./List.vue";
import SenaraiForm from "./Form.vue";

export default {
  components: {
    AppLayout,
    List,
    SenaraiForm,
  },
  props: ["senarais"],
  data() {
    return {
      isFormOpen: false,
    };
  },
  methods: {
    toggleForm() {
      this.isFormOpen = !this.isFormOpen;
      console.log(this.isFormOpen);
    },
  },
};
</script>

<template>
  <AppLayout title="Senarai">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Senarai</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <Button label="+" @click="toggleForm" />
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
          <senarai-form v-if="isFormOpen" />
          <list v-else />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
