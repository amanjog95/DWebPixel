<script setup lang="ts">

defineProps({
  companyLogo: String,
  jobTitle: String,
  companyName: String,
  experience: String,
  salary: String,
  location: String,
  extra: String,
  description: String,
  tags: Array,
});
</script>


<style scoped>
/* Ensure that the job card is positioned relative to its content */
.bg-white {
  position: relative; /* Position relative to allow absolute positioning of location */
}
</style>

<template>
  <div class="bg-white shadow rounded-lg p-6">

    <span class="absolute top-4 right-4 text-sm text-gray-500 bg-blue-100 text-blue-600 px-2 py-1 rounded">{{ location }}</span>

    <div class="flex items-center mb-4">
      <div class="bg-gray-100 text-primary-500 rounded-full flex items-center justify-center w-12 h-12 font-bold">
        <img :src="companyLogo" alt="Company Logo" class="w-10 h-10 object-cover rounded-full" />
      </div>
      <div class="ml-4">
        <h3 class="text-lg font-semibold text-gray-900">{{ jobTitle }}</h3>
        <p class="text-sm text-gray-500">{{ companyName }}</p>
      </div>
    </div>
    <div class="flex flex-wrap gap-2 mb-4">
      <span class="bg-blue-100 text-blue-600 text-sm px-2 py-1 rounded">
        <i class="fa fa-history"></i>
        {{ experience }}
      </span>
      <span class="bg-blue-100 text-blue-600 text-sm px-2 py-1 rounded">
        <i class="fas fa-dollar-sign"></i> 
        {{ salary }}
      </span>
      <span class="bg-gray-100 text-gray-600 text-sm px-2 py-1 rounded">{{ extra }}</span>
    </div>
    <p class="text-sm text-gray-700 mb-4">{{ description }}</p>
    <div class="flex flex-wrap gap-2">
      <span
        v-for="(tag, index) in tags"
        :key="index"
        class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded"
      >
        {{ tag }}
      </span>
    </div>
  </div>
</template>
