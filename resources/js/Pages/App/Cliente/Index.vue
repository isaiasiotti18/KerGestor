<template>
  <AppLayout title="Clientes">

    <template #header>
      <div class="flex justify-left">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-1 mr-5">
          Clientes Cadastrados
        </h2>
      </div>
    </template>

    <Section>
      <DataTable :value="clientes" tableStyle="min-width: 50rem" paginator :rows="10"
        :rowsPerPageOptions="[5, 10, 20, 50]" class="w-full">
        <Column field="id" header="Id" sortable></Column>
        <Column field="nome" header="Nome" sortable></Column>
        <Column field="telefone" header="Telefone" sortable></Column>
        <Column field="created_at" header="Data Criação" sortable>
          <template #body="{ data }">
            {{ dateFormat(data.created_at) }}
          </template>
        </Column>
      </DataTable>
    </Section>


  </AppLayout>
</template>

<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';                 // optional
import AppLayout from '@/Layouts/AppLayout.vue';
import Section from '@/Components/Section.vue';

const props = defineProps([
  'clientes'
]);

const dateFormat = (data) => {

  let date = new Date(data);

  let dateFormat =  new Intl.DateTimeFormat('pt-BR', {
    year: "2-digit",
    month: '2-digit',
    day: '2-digit'
  });

  return dateFormat.format(date);
};

</script>
