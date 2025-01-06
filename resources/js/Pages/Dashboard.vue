<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import JobCard from '@/Components/JobCard.vue';
import { Head } from '@inertiajs/vue3';
import { PropType } from 'vue';


interface Job {
  id: number;
  company_logo: string;
  title: string;
  company_name: string;
  experience: string;
  salary: string;
  location: string;
  extra: string;
  description: string;
  skills: string;
}

defineProps({
  jobs: {
    type: Array as PropType<Job[]>,
    required: true,
  },
});

const imageBasePath = '/storage/';

const getCompanyLogo = (logoPath: string) => {
  return `${imageBasePath}${logoPath}`;
};

const parseTags = (skills: string) => {
  try {
    // Parse the skills string into an actual array (e.g., ["php", "laravel", "python"])
    const tagsArray = JSON.parse(skills || '[]');
    
    // Trim each tag and return the result
    return tagsArray.map((tag: string) => tag.trim());
  } catch (e) {
    console.error('Error parsing skills:', e);
    return [];
  }
};

</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- Hero -->
    <Hero />

    <!-- Job List -->
    <div class="bg-gray-50">
      <div class="container py-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
          <!-- Render Job Cards -->
          <JobCard
            v-for="(job, index) in jobs"
            :key="job.id || index"
            :company-logo="getCompanyLogo(job.company_logo)"
            :job-title="job.title"
            :company-name="job.company_name"
            :experience="job.experience"
            :salary="job.salary"
            :location="job.location"
            :extra="job.extra"
            :description="job.description"
            :tags="parseTags(job.skills)" 
          />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
