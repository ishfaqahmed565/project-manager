@props(['member'])

                                <tr class="text-gray-700">
                                   
                                    <td class="border-b-2 p-4 dark:border-dark-5">
                                        {{$member->name}}
                                    </td>
                                    <td class="border-b-2 p-4 dark:border-dark-5">
                                        {{$member->role->role}}
                                    </td>
                                    <td class="border-b-2 p-4 dark:border-dark-5">
                                        @can('adminORmanager')
                                       <form action="{{route('deleteProjectAssignment',[$member->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                           <button onclick="return confirm('Are you sure you want to remove this member?')"class="text-red-600 hover:text-indigo-900">
                                               Remove
                                            </button>
                                       </form>
                                       @endcan 

                                    </td>
                                </tr>
                            