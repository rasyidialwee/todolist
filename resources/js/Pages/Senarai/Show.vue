<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    AppLayout,
    Link,
  },
  props: {
    senarai: {
      type: Object,
      required: true,
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
        <Link :href="route('senarai')">
          <Button label="back" />
        </Link>

        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
          <h1>Nama Senarai :{{ senarai.name }}</h1>
          <h5>Description: {{ senarai.description }}</h5>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
