<template>
  <div class="flex h-screen">
    <div class="bg-blue-400 w-12"></div>
    <div class="bg-gray-50 w-64">
      <div>
        <nav>
          <a href="#" class="flex pl-4 py-1 items-center"><AdjustmentsIcon class="h-5 w-5" /><span class="mx-3">Dashboard</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><UsersIcon class="h-5 w-5" /><span class="mx-3">User</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><CollectionIcon class="h-5 w-5" /><span class="mx-3">Departments</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><UserGroupIcon class="h-5 w-5" /><span class="mx-3">Employee</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><LightningBoltIcon class="h-5 w-5" /><span class="mx-3">Activities</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><SunIcon class="h-5 w-5" /><span class="mx-3">Holidays</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><CalendarIcon class="h-5 w-5" /><span class="mx-3">Events</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><CreditCardIcon class="h-5 w-5" /><span class="mx-3">Payroll</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><UsersIcon class="h-5 w-5" /><span class="mx-3">Accounts</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><DocumentReportIcon class="h-5 w-5" /><span class="mx-3">Report</span></a>
        </nav>
      </div>
    </div>
    <div class="bg-blue-100 flex-1">

    </div>
  </div>
</template>

<script>
import { reactive, toRefs } from 'vue'
import { AdjustmentsIcon, UsersIcon, CollectionIcon, UserGroupIcon, LightningBoltIcon, SunIcon, CalendarIcon, UserIcon, CreditCardIcon, DocumentReportIcon  } from '@heroicons/vue/outline'
export default {

  name: 'Index',

  components: {
    AdjustmentsIcon,
    UsersIcon,
    CollectionIcon,
    UserGroupIcon,
    LightningBoltIcon,
    SunIcon,
    CalendarIcon,
    UserIcon,
    CreditCardIcon,
    DocumentReportIcon,
  },

  setup () {
    const state = reactive({

    })
    return { ...toRefs(state) }
  }
}
</script>

<style lang="css" scoped>
</style>
