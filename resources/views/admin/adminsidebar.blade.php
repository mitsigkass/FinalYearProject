<!--
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
-->



<!-- Sidebar -->
 <nav
      id="sidebarMenu"
      class="collapse d-lg-block sidebar collapse bg-white"
      >
   <div class="position-sticky">
     <div class="list-group list-group-flush mx-3 mt-4">

         <a
            href="{{ url('reports')}}"
            class="list-group-item list-group-item-action py-2 ripple"
            ><i class="fas fa-lock fa-fw me-3"></i
           ><span>Reports</span></a
           >
       <a
          href="{{ url('registered-ads')}}"
          class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-chart-line fa-fw me-3"></i
         ><span>All Registered Ads</span></a
         >
         <a
            href="{{url('registered-user')}}"
            class="list-group-item list-group-item-action py-2 ripple"
            ><i class="fa fa-users mr-3"></i
           ><span>Registered Users</span></a
           >

     </div>
   </div>
 </nav>
 <!-- Sidebar -->
