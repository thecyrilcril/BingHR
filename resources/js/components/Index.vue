<template>
  <ConfirmDelete
    :show="showConfirmBox"
    :actionInfo="actionReview"
    @confirm="confirmAction"
    @cancel="showConfirmBox = false"
  />
  <button id="toggle-add-modal" class="hidden bg-green-600 text-green-50 rounded-lg px-4 py-2" type="button" data-modal-toggle="add-user-modal">Add User</button>
  <button id="toggle-update-modal" class="hidden bg-green-600 text-green-50 rounded-lg px-4 py-2" type="button" data-modal-toggle="update-user-modal">Update User</button>
  <!-- Update User Modal -->
  <div id="update-user-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Update User
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-user-modal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <form action="#" method="POST" autocomplete="off">
                  <!-- <div class="shadow overflow-hidden sm:rounded-md"> -->
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                          <input v-model="user.employee_id" type="text" name="employee_id" readonly class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Employee ID*" />
                          <span></span>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                          <input v-model="user.first_name" type="text" name="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="First name*" />
                          <span class="block h-5">
                            <span v-show="formErrors.first_name" class="text-sm text-indigo-800">{{ formErrors.first_name }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                          <input v-model="user.last_name" type="text" name="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Last name*" />
                          <span class="block h-5">
                            <span v-show="formErrors.last_name" class="text-sm text-indigo-800">{{ formErrors.last_name }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <input v-model="user.email" type="text" name="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Email ID *"/>
                          <span class="block h-5">
                            <span v-show="formErrors.email" class="text-sm text-indigo-800">{{ formErrors.email }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <input v-model="user.mobile_number" type="text" name="mobile_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Mobile No *" />
                          <span class="block h-5">
                            <span v-show="formErrors.mobile_number" class="text-sm text-indigo-800">{{ formErrors.mobile_number }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <select v-model="user.role_id" name="role_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option :value="null" disabled selected>Select Role Type</option>
                            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.title }}</option>
                          </select>
                          <span class="block h-5">
                            <span v-show="formErrors.role_id" class="text-sm text-indigo-800">{{ formErrors.role_id }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          <input v-model="user.user_name" type="text" name="user_name" autocomplete="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Username *" />
                          <span class="block h-5">
                            <span v-show="formErrors.user_name" class="text-sm text-indigo-800">{{ formErrors.user_name }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <input v-model="user.password" type="password" name="password" autocomplete="new-password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Password *"/>
                          <span class="block h-5">
                            <span v-show="formErrors.password" class="text-sm text-indigo-800">{{ formErrors.password }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <input v-model="user.password_confirmation" type="password" name="confirm_password" autocomplete="new-password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Confirm Password *" />
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center justify-center space-x-4">
                      <label v-for="permission in permissions" :key="permission.id" class="inline-flex items-center">
                        <input @change="check" class="form-radio" type="radio" :checked="permission.id == user.permission_id" name="permision" :value="permission.id">
                        <span class="ml-2">{{ permission.name }}</span>
                      </label>
                    </div>
                    <span class="block h-5 flex justify-center">
                      <span v-show="formErrors.permission_id" class="text-sm text-indigo-800">{{ formErrors.permission_id }}</span>
                    </span>
                </form>
              </div>
              <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-base font-medium text-gray-500 capitalize bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                      <th scope="col" class="px-6 py-5">
                      Module Permission
                      </th>
                      <th scope="col" class="px-6 py-5">
                      Read
                      </th>
                      <th scope="col" class="px-6 py-5">
                      Write
                      </th>
                      <th scope="col" class="px-6 py-5">
                      Delete
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="permission in permissions" :key="permission.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ permission.name }}
                      </th>
                        <td v-for="action in permission.actions" :key="action.id" class="px-6 py-4">
                          <label class="inline-flex items-center">
                            <input @change="updatePermissions" :data-permission-id="permission.id" type="checkbox" class="
                              rounded
                              border-gray-300
                              text-indigo-600
                              shadow-sm
                              focus:border-indigo-300
                              focus:ring
                              focus:ring-offset-0
                              focus:ring-indigo-200
                              focus:ring-opacity-50
                            " :checked="action.active" :value="action.id">
                        </label>
                        </td>
                    </tr>
                  </tbody>
              </table>
              </div>
              <!-- Modal footer -->
              <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                  <button @click="updateUser(currentlyUpdating)" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update User</button>
                  <button data-modal-toggle="update-user-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
              </div>
          </div>
      </div>
  </div>


  <!-- Add User Modal -->
  <div id="add-user-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Add User
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-user-modal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <form action="#" method="POST" autocomplete="off">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                          <input v-model="user.employee_id" type="text" name="employee_id" readonly class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Employee ID*" />
                          <span></span>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                          <input v-model="user.first_name" type="text" name="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="First name*" />
                          <span class="block h-5">
                            <span v-show="formErrors.first_name" class="text-sm text-indigo-800">{{ formErrors.first_name }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                          <input v-model="user.last_name" type="text" name="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Last name*" />
                          <span class="block h-5">
                            <span v-show="formErrors.last_name" class="text-sm text-indigo-800">{{ formErrors.last_name }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <input v-model="user.email" type="text" name="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Email ID *"/>
                          <span class="block h-5">
                            <span v-show="formErrors.email" class="text-sm text-indigo-800">{{ formErrors.email }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <input v-model="user.mobile_number" type="text" name="mobile_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Mobile No *" />
                          <span class="block h-5">
                            <span v-show="formErrors.mobile_number" class="text-sm text-indigo-800">{{ formErrors.mobile_number }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <select v-model="user.role_id" name="role_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option :value="null" disabled selected>Select Role Type</option>
                            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.title }}</option>
                          </select>
                          <span class="block h-5">
                            <span v-show="formErrors.role_id" class="text-sm text-indigo-800">{{ formErrors.role_id }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          <input v-model="user.user_name" type="text" name="user_name" autocomplete="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Username *" />
                          <span class="block h-5">
                            <span v-show="formErrors.user_name" class="text-sm text-indigo-800">{{ formErrors.user_name }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <input v-model="user.password" type="password" name="password" autocomplete="new-password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Password *"/>
                          <span class="block h-5">
                            <span v-show="formErrors.password" class="text-sm text-indigo-800">{{ formErrors.password }}</span>
                          </span>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <input v-model="user.password_confirmation" type="password" name="confirm_password" autocomplete="new-password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Confirm Password *" />
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center justify-center space-x-4">
                      <label v-for="permission in permissions" :key="permission.id" class="inline-flex items-center">
                        <input @change="check" class="form-radio" type="radio" name="permision" :value="permission.id">
                        <span class="ml-2">{{ permission.name }}</span>
                      </label>
                    </div>
                    <span class="block h-5 flex justify-center">
                      <span v-show="formErrors.permission_id" class="text-sm text-indigo-800">{{ formErrors.permission_id }}</span>
                    </span>
                </form>
              </div>
              <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-base font-medium text-gray-500 capitalize bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                      <th scope="col" class="px-6 py-5">
                      Module Permission
                      </th>
                      <th scope="col" class="px-6 py-5">
                      Read
                      </th>
                      <th scope="col" class="px-6 py-5">
                      Write
                      </th>
                      <th scope="col" class="px-6 py-5">
                      Delete
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-show="permissions.length > 0" v-for="permission in permissions" :key="permission.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ permission.name }}
                      </th>
                        <td v-for="action in permission.actions" :key="action.id" class="px-6 py-4">
                          <label class="inline-flex items-center">
                            <input @change="updatePermissions" :data-permission-id="permission.id" type="checkbox" class="
                              rounded
                              border-gray-300
                              text-indigo-600
                              shadow-sm
                              focus:border-indigo-300
                              focus:ring
                              focus:ring-offset-0
                              focus:ring-indigo-200
                              focus:ring-opacity-50
                            " :checked="action.active" :value="action.id">
                        </label>
                        </td>
                    </tr>
                  </tbody>
              </table>
              </div>
              <!-- Modal footer -->
              <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                  <button @click="addUser" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add User</button>
                  <button data-modal-toggle="add-user-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
              </div>
          </div>
      </div>
  </div>

  <div class="flex h-screen">
    <div class="bg-blue-500 w-12 flex flex-col text-gray-200 justify-between pt-20 pb-10">
      <div class="flex flex-col space-y-10 items-center">
        <a href="#"><SearchIcon class="h-5 w-5" /></a>
        <a href="#"><CalendarIcon class="h-5 w-5" /></a>
        <a href="#"><UserIcon class="h-5 w-5" /></a>
        <a href="#"><ChatIcon class="h-5 w-5" /></a>
        <a href="#"><DocumentIcon class="h-5 w-5" /></a>
      </div>
      <div class="flex flex-col space-y-10 items-center">
        <a href="#"><CogIcon class="h-5 w-5" /></a>
        <a href="#"><img :src="`https://i.pravatar.cc/25`"  class="border border-white w-8 h-8 rounded-full" alt="user.fullname"></a>
        <a @click="toggleMenu"><MenuAlt2Icon class="h-5 w-5" /></a>
      </div>
    </div>
    <div ref="menu" class="transition-width bg-gray-50 w-64 pt-14">
      <div>
        <nav class="space-y-1 text-gray-500" :class="{ 'space-y-2' : hideText }">
          <a href="#" class="flex pl-4 py-1 items-center"><AdjustmentsIcon class="h-5 w-5 mr-3" /><span :class="{ 'hidden' : hideText }">Dashboard</span></a>
          <a href="#" class="flex pl-4 py-1 items-center text-blue-500 border-r-4 border-blue-500"><UsersIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">User</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><CollectionIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Departments</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><UserGroupIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Employee</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><LightningBoltIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Activities</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><SunIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Holidays</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><CalendarIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Events</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><CreditCardIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Payroll</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><UsersIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Accounts</span></a>
          <a href="#" class="flex pl-4 py-1 items-center"><DocumentReportIcon class="h-5 w-5 mr-3" /><span :class="{'hidden' : hideText }">Report</span></a>
        </nav>
      </div>
    </div>
    <div class="bg-blue-100 flex-1">
      <div class="top-bar flex justify-between mx-6 py-4 border-b border-blue-200">
        <div class="flex items-center space-x-4">
          <h2>Users</h2>
          <label class="block">
            <select class="
                block
                w-full
                mt-1
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
              ">
              <option>Year</option>
            </select>
          </label>
          <div class="bg-white dark:bg-slate-900 relative pointer-events-auto"><button type="button" class="hidden w-full lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"><input class="ml-auto pl-3 flex-none text-lg font-semibold" placeholder="Search..." /><svg width="24" height="24" fill="none" aria-hidden="true" class="mr-3 flex-none"><path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle></svg></button></div>
        </div>
        <div class="flex items-center space-x-4">
          <button class="flex items-center"><span>Language</span> <ChevronDownIcon class="h-4 w-4" /></button>
          <button class="flex items-center"><span>Reports</span> <ChevronDownIcon class="h-4 w-4" /></button>
          <button class="flex items-center"><span>Project</span> <ChevronDownIcon class="h-4 w-4" /></button>
          <button class="relative"><MailIcon class="h-5 w-5" /><span class="block absolute top-[-2px] right-[-2px] bg-blue-500 rounded-full w-2 h-2"></span></button>
          <button class="relative"><BellIcon class="h-5 w-5" /><span class="block absolute top-[-2px] right-[-2px] bg-blue-500 rounded-full w-2 h-2"></span></button>
          <button><SolidUserIcon class="h-5 w-5" /></button>
        </div>
      </div>
      <div class="flex justify-end px-6 my-4">
        <button @click="showAddUserModal('toggle-add-modal')" class="bg-green-600 text-green-50 rounded-lg px-4 py-2" type="button">Add User</button>
      </div>
      <div class="relative overflow-x-auto sm:rounded-lg px-6">
        <div class="bg-blue-50 px-6 flex justify-between items-center py-2">
          <h3 class="font-medium text-xl">List Users</h3>
          <div class="bg-white dark:bg-slate-900 relative pointer-events-auto"><button type="button" class="hidden w-full lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"><input class="ml-auto pl-3 flex-none text-lg font-semibold" placeholder="Search..." /><svg width="24" height="24" fill="none" aria-hidden="true" class="mr-3 flex-none"><path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle></svg></button></div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
              Name
              </th>
              <th scope="col" class="px-6 py-3">

              </th>
              <th scope="col" class="px-6 py-3">
              Create Date
              </th>
              <th scope="col" class="px-6 py-3">
              Role
              </th>
              <th scope="col" class="px-6 py-3 text-right">
              Action
              <span class="sr-only">Action</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user, index in users" :key="user.email" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                <img :src="`https://i.pravatar.cc/25${index}`"  class="w-12 h-12 rounded-full mr-2" alt="user.fullname">
                <div class="flex flex-col">
                  <span class="font-bold">{{ user.fullname }}</span>
                  <span class="text-gray-500">{{ user.email }}</span>
                </div>
              </th>
              <td class="px-6 py-4">
                <span class="inline-block px-4 py-1 rounded-md w-32 text-gray-50 text-center" :class="permissionColors[user.permission]">{{ user.permission }}</span>
              </td>
              <td class="px-6 py-4">
              <span>{{ user.created_date }}</span>
              </td>
              <td class="px-6 py-4">
              <span>{{ user.role }}</span>
              </td>
              <td class="px-6 py-4 text-right">
                <div class="space-x-6">
                  <button @click="fetchUserData(user.id)"><PencilAltIcon class="h-5 w-5" /></button>
                  <button @click="attemptDelete(user.id, user.fullname, deleteUser, 'Delete')" class="hover:text-violet-600 active:text-violet-700 focus:outline-none focus:ring focus:ring-violet-300"><TrashIcon class="h-5 w-5" /></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="absolute bottom-7 px-6">
        <small class="font-medium text-gray-500">&copy; copyright 2022 <span class="font-semibold text-gray-700">BingHR.io</span></small>
      </div>

    </div>
  </div>
</template>

<script>

import { reactive, toRefs, ref, onBeforeMount, defineAsyncComponent, nextTick, computed, onMounted } from 'vue'
import { SearchIcon, ChatIcon, DocumentIcon, AdjustmentsIcon, UsersIcon, CollectionIcon, UserGroupIcon, LightningBoltIcon, SunIcon, CalendarIcon, UserIcon, CreditCardIcon, DocumentReportIcon, ChevronDownIcon, PencilAltIcon, TrashIcon, CogIcon, MenuAlt2Icon  } from '@heroicons/vue/outline'
import {  MailIcon, BellIcon, UserIcon as SolidUserIcon } from '@heroicons/vue/solid'
import { useToast } from 'vue-toastification'
import Nprogress from 'nprogress'
import { clearObject } from '../Helpers'

export default {

  name: 'Index',

  components: {
    SearchIcon,
    ChatIcon,
    DocumentIcon,
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
    ChevronDownIcon,
    MailIcon,
    BellIcon,
    SolidUserIcon,
    PencilAltIcon,
    TrashIcon,
    CogIcon,
    MenuAlt2Icon,
    ConfirmDelete: defineAsyncComponent(() => import('./utils/ConfirmDelete.vue')),
  },

  setup () {
    const menu = ref(null)
    const toast = useToast()
    const state = reactive({
      users: [],
      roles: [],
      permissions: [],
      actions: [],
      permissionColors : {
        'Super Admin': 'bg-red-500',
        'Admin': 'bg-blue-500',
        'HR Admin': 'bg-green-500',
        'Employee': 'bg-gray-100 text-gray-600',
      },
      showConfirmBox: false,
      confirmAction: null,
      actionReview: {
        entity_id: null,
        entity_name: null,
        action_name: null,
      },
      user: {
        employee_id: null,
        permission_id: null,
        first_name: null,
        last_name: null,
        email: null,
        mobile_number: null,
        role_id: null,
        user_name: null,
        password: null,
        password_confirmation: null,
        permissions_rights: new Set()
      },
      formErrors: {
        first_name: null,
        last_name: null,
        email: null,
        mobile_number: null,
        role_id: null,
        user_name: null,
        password: null,
        permission_id: null
      },
      currentlyUpdating: null,
      filteredPermissions: computed(() => state.permissions.filter(permission => permission.id == state.user.permission_id)),
      check: (evt) => {
        const event = evt
        nextTick(() => (evt.target.checked) ? state.user.permission_id = evt.target.value : null)
      },

      toggleModal: (domID) => document.getElementById(domID).click(),

      showAddUserModal: (domID) => {
        clearObject(state.user)
        state.toggleModal(domID)
      },

      preparePermissionRights: (event) => (event.target.checked) ?
        state.user.permissions_rights.add(event.target.value) :
        state.user.permissions_rights.delete(event.target.value),

      updatePermissions: async (event) => {
        Nprogress.start()

        const permission_id = event.target.dataset.permissionId
        const action_type = (event.target.checked) ? 'checked' : 'unchecked'
        const action_id =  event.target.value
        if (!permission_id || !action_id) {
          Nprogress.done()

          return
        }
        const response = await axios.patch(`/api/permissions/${permission_id}`, { action_id, action_type  })
        state.refreshPermissions()
        Nprogress.done()

      },

      addUser: async () => {
        Nprogress.start()
        try {
          const response = await axios.post('/api/users', state.user)
          state.refreshUserList()
          state.toggleModal('toggle-add-modal')
          toast.success('User Added')
          Nprogress.done()
          clearObject(state.user)
          clearObject(state.formErrors)


        } catch(error) {
          Nprogress.done()
          toast.error('There was an error')
          if (error.response && error.response.status == 422) {
            return state.validationErrors(error)
          }
        }
      },

      updateUser: async (user_id) => {
        Nprogress.start()
        try {
          state.user.id = user_id
          const response = await axios.patch(`/api/users/${user_id}`, state.user)
          state.refreshUserList()
          state.toggleModal('toggle-update-modal')
          toast.success('User Updated')
          Nprogress.done()
          clearObject(state.user)
          clearObject(state.formErrors)


        } catch(error) {
          Nprogress.done()
          toast.error('There was an error')
          if (error.response && error.response.status == 422) {
            return state.validationErrors(error)
          }

        }
      },

      fetchUserData: async (user_id) => {
        Nprogress.start()
        try {
          const response = await axios.get(`/api/users/${user_id}`)
          const { user } = response.data
          state.user.permission_id = user.permission_id
          state.user.first_name = user.first_name
          state.user.last_name = user.last_name
          state.user.email = user.email
          state.user.mobile_number = user.mobile_number
          state.user.role_id = user.role_id
          state.user.user_name = user.user_name
          state.user.password = null
          state.user.password_confirmation = null
          state.currentlyUpdating = user.id

          state.toggleModal('toggle-update-modal')

          Nprogress.done()


        } catch (error) {
          Nprogress.done()
          toast.error('There was an error')
        }

      },

      attemptDelete: (entity_id, entity_name, action, action_name) => {
        state.showConfirmBox = true
        state.actionReview.entity_id = entity_id
        state.actionReview.entity_name = entity_name
        state.actionReview.action_name = action_name
        state.confirmAction = action
      },

      deleteUser: async (id) => {
        Nprogress.start()
        state.showConfirmBox = false
        try {
          const response = await axios.delete(`/api/users/${id}`)
          state.refreshUserList()
          toast.success('User deleted')
          Nprogress.done()

        } catch(error) {
          Nprogress.done()
          toast.error('There was an error')


        }
      },

      refreshUserList: async () => {
        const response = await axios.get('/api/users')
        const { links, meta, users } = response.data
        state.users = users
      },

      refreshPermissions: async () => {
        const response = await axios.get('/api/permissions')
        const permissions = response.data
        state.permissions = permissions
      },

      validationErrors: (error) => {
        const { first_name, last_name, email, mobile_number, role_id, user_name, password, permission_id } = error.response.data.errors
        state.formErrors.first_name = (first_name) ? first_name.toString() : null
        state.formErrors.last_name = (last_name) ? last_name.toString() : null
        state.formErrors.email = (email) ? email.toString() : null
        state.formErrors.mobile_number = (mobile_number) ? mobile_number.toString() : null
        state.formErrors.role_id = (role_id) ? role_id.toString() : null
        state.formErrors.user_name = (user_name) ? user_name.toString() : null
        state.formErrors.password = (password) ? password.toString() : null
        state.formErrors.permission_id = (permission_id) ? permission_id.toString() : null
      }
    })

    onBeforeMount( async () => {
      Nprogress.start()
      // fire off all initial requests
      const requests = [
        axios.get('/api/users'),
        axios.get('/api/roles'),
        axios.get('/api/permissions'),
        axios.get('/api/actions'),
      ]
      const allPromises = requests.map(request => request)
      const all = await Promise.all(allPromises)
      const [ usersResponse, rolesResponse, permissionsResponse, actionsResponse ] = all
      const { links, meta, users } = usersResponse.data
      const roles = rolesResponse.data
      const permissions = permissionsResponse.data
      const actions = actionsResponse.data
      state.users = users
      state.roles = roles
      state.permissions = permissions
      state.actions = actions
      Nprogress.done()

    })
    return { ...toRefs(state) }
  },

  data:() => ({
    hideText: false
  }),

  methods: {
    toggleMenu() {
      if (this.$refs.menu.classList.contains('w-64')) {
        this.hideText = true
        this.$refs.menu.classList.replace('w-64', 'w-14')
      } else {
        this.hideText = false
        this.$refs.menu.classList.replace('w-14', 'w-64')
      }
    }
  }


}
</script>
