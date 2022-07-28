<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import List from "./List.vue";
import SenaraiForm from "./Form.vue";
import { useToast } from "vue-toastification";

export default {
  setup() {
    // Get toast interface
    const toast = useToast();
    return { toast };
  },
  components: {
    AppLayout,
    List,
    SenaraiForm,
  },
  props: {
    senarais: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      isFormOpen: false,
      _senarais: this.senarais,
      selectedSenarai: null,
    };
  },
  methods: {
    toggleForm() {
      this.isFormOpen = !this.isFormOpen;
      console.log(this.isFormOpen);
    },
    saved(senarai) {
      console.log("dah save", senarai);
      this._senarais.push(senarai);

      this.isFormOpen = false;

      this.toast.success("Senarai " + senarai.name + " Saved!!");
    },
    editSenarai(senarai) {
      this.selectedSenarai = senarai;
      this.isFormOpen = true;
      console.log("selected", this.selectedSenarai);
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
          <senarai-form
            v-if="isFormOpen"
            @saved="saved"
            :senarai="selectedSenarai"
          />
          <list v-else :senarais="_senarais" @edit="editSenarai" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
