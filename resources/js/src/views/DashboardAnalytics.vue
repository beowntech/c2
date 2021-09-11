<!-- =========================================================================================
  File Name: DashboardAnalytics.vue
  Description: Dashboard Analytics
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="dashboard-analytics">
    <div class="vx-row">

      <!-- CARD 1: CONGRATS -->
      <div class="vx-col w-full lg:w-1/2 mb-base">
        <vx-card slot="no-body" class="text-center bg-primary-gradient greet-user">
<!--                    <img src="@assets/images/elements/decore-left.png" class="decore-left" alt="Decore Left" width="200" >-->
<!--                    <img src="@assets/images/elements/decore-right.png" class="decore-right" alt="Decore Right" width="175">-->
          <feather-icon icon="AwardIcon" class="p-6 mb-8 bg-primary inline-flex rounded-full text-white shadow" svgClasses="h-8 w-8"></feather-icon>
          <h1 class="mb-6 text-white">Admission Jockey</h1>
          <p class="xl:w-3/4 lg:w-4/5 md:w-2/3 w-4/5 mx-auto text-white">You have done <strong>{{ checkpointReward.progress }}</strong> more sales today. Check your new badge in your profile.</p>
        </vx-card>
      </div>

      <!-- CARD 2: SUBSCRIBERS GAINED -->
      <div class="vx-col w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-base">
        <statistics-card-line icon="GridIcon" v-if="$acl.not.check('blogger') || $acl.not.check('sadmin')" v-bind:statistic="this.collegeCount" statisticTitle="Colleges" :chartData="subscribersGained.series" type='area'></statistics-card-line>
          <statistics-card-line icon="GridIcon" v-else v-bind:statistic="this.blogCount" statisticTitle="Blogs" :chartData="subscribersGained.series" type='area'></statistics-card-line>
      </div>

      <!-- CARD 3: ORDER RECIEVED -->
      <div class="vx-col w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-base">
        <statistics-card-line icon="EyeIcon" v-if="$acl.not.check('blogger') || $acl.not.check('sadmin')" v-bind:statistic="this.viewCount" statisticTitle="Page Views" :chartData="ordersRecevied.series" color='warning' type='area'></statistics-card-line>
          <statistics-card-line icon="EyeIcon" v-else v-bind:statistic="this.blogviewCount" statisticTitle="Blog Views" :chartData="ordersRecevied.series" color='warning' type='area'></statistics-card-line>
      </div>
    </div>

    <div class="vx-row">

      <!-- CARD 4: SESSION -->
      <div class="vx-col w-full md:w-1/2 mb-base">
        <vx-card>
          <div class="vx-row flex-col-reverse md:flex-col-reverse sm:flex-row lg:flex-row">

            <!-- LEFT COL -->
            <div class="vx-col w-full md:w-full sm:w-1/2 lg:w-1/2 xl:w-1/2 flex flex-col justify-between" v-if="salesBarSession">
              <div>
                <h2 class="mb-1 font-bold">{{ salesBarSession[0].count | k_formatter }}</h2>
                <span class="font-bold">College Analytics</span>

                <!-- Previous Data Comparison -->
<!--                <p class="mt-2 text-xl font-medium">-->
<!--                  <span :class="salesBarSession.analyticsData.comparison.result >= 0 ? 'text-success' : 'text-danger'">-->
<!--                    <span v-if="salesBarSession.analyticsData.comparison.result > 0">+</span>-->
<!--                    <span>{{ salesBarSession.analyticsData.comparison.result }}</span>-->
<!--                  </span>-->
<!--                  <span> vs </span>-->
<!--                  <span>{{ salesBarSession.analyticsData.comparison.str }}</span>-->
<!--                </p>-->
              </div>
<!--              <vs-button icon-pack="feather" icon="icon-chevrons-right" icon-after class="shadow-md w-full lg:mt-0 mt-4">View Details</vs-button>-->
            </div>

            <!-- RIGHT COL -->
            <div class="vx-col w-full md:w-full sm:w-1/2 lg:w-1/2 xl:w-1/2 flex flex-col lg:mb-0 md:mb-base sm:mb-0 mb-base">
              <change-time-duration-dropdown class="self-end" />
              <vue-apex-charts type=bar height=200 :options="analyticsData.salesBar.chartOptions" :series="salesBarSession[0].series" v-if="salesBarSession[0].series" />
            </div>

          </div>
          <vs-divider class="my-6"></vs-divider>
          <div class="vx-row">
            <div class="vx-col w-1/2 mb-3">
              <p v-text="'Teachers Added: '+salesBarSession[0].teacher"> </p>
              <vs-progress class="block mt-1" :percent="50" color="primary"></vs-progress>
            </div>
            <div class="vx-col w-1/2 mb-3">
              <p v-text="'Gallery Added: '+salesBarSession[0].gallery"> </p>
              <vs-progress class="block mt-1" :percent="60" color="warning"></vs-progress>
            </div>
            <div class="vx-col w-1/2 mb-3">
              <p v-text="'Courses Added: '+salesBarSession[0].course"></p>
              <vs-progress class="block mt-1" :percent="70" color="danger"></vs-progress>
            </div>
            <div class="vx-col w-1/2 mb-3">
              <p v-text="'Hostel Added: '+salesBarSession[0].hostel"></p>
              <vs-progress class="block mt-1" :percent="90" color="success"></vs-progress>
            </div>
          </div>
        </vx-card>
      </div>

      <!-- CARD 5: SUPPORT TRACKER -->
<!--      <div class="vx-col w-full md:w-1/2 lg:w-1/2 xl:w-1/2 mb-base">-->
<!--          <vx-card title="Support Tracker">-->
<!--              &lt;!&ndash; CARD ACTION &ndash;&gt;-->
<!--              <template slot="actions">-->
<!--                  <change-time-duration-dropdown />-->
<!--              </template>-->

<!--              <div slot="no-body" v-if="supportTracker.analyticsData">-->
<!--                  <div class="vx-row text-center">-->

<!--                      &lt;!&ndash; Open Tickets Heading &ndash;&gt;-->
<!--                      <div class="vx-col w-full lg:w-1/5 md:w-full sm:w-1/5 flex flex-col justify-between mb-4 lg:order-first md:order-last sm:order-first order-last">-->
<!--                          <div class="lg:ml-6 lg:mt-6 md:mt-0 md:ml-0 sm:ml-6 sm:mt-6">-->
<!--                              <h1 class="font-bold text-5xl">{{ supportTracker.analyticsData.openTickets }}</h1>-->
<!--                              <small>Tickets</small>-->
<!--                          </div>-->
<!--                      </div>-->

<!--                      &lt;!&ndash; Chart &ndash;&gt;-->
<!--                      <div class="vx-col w-full lg:w-4/5 md:w-full sm:w-4/5 justify-center mx-auto lg:mt-0 md:mt-6 sm:mt-0 mt-6">-->
<!--                          <vue-apex-charts type=radialBar height=385 :options="analyticsData.supportTrackerRadialBar.chartOptions" :series="supportTracker.series" />-->
<!--                      </div>-->
<!--                  </div>-->

<!--                  &lt;!&ndash; Support Tracker Meta Data &ndash;&gt;-->
<!--                  <div class="flex flex-row justify-between px-8 pb-4 mt-4">-->
<!--                      <p class="text-center" v-for="(val, key) in supportTracker.analyticsData.meta" :key="key">-->
<!--                        <span class="block">{{ key }}</span>-->
<!--                        <span class="text-2xl font-semibold">{{ val }}</span>-->
<!--                      </p>-->
<!--                  </div>-->
<!--              </div>-->
<!--          </vx-card>-->
<!--      </div>-->
    </div>

    <div class="vx-row">
      <!-- CARD 9: DISPATCHED ORDERS -->
      <div class="vx-col w-full">
        <vx-card title="Dispatched Orders">
          <div slot="no-body" class="mt-4">
            <vs-table :data="dispatchedOrders" class="table-dark-inverted">
              <template slot="thead">
                <vs-th>ORDER NO.</vs-th>
                <vs-th>STATUS</vs-th>
                <vs-th>OPERATORS</vs-th>
                <vs-th>LOCATION</vs-th>
                <vs-th>DISTANCE</vs-th>
                <vs-th>START DATE</vs-th>
                <vs-th>EST DELIVERY DATE</vs-th>
              </template>

              <template slot-scope="{data}">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                  <vs-td :data="data[indextr].orderNo">
                    <span>#{{data[indextr].orderNo}}</span>
                  </vs-td>
                  <vs-td :data="data[indextr].status">
                    <span class="flex items-center px-2 py-1 rounded"><div class="h-3 w-3 rounded-full mr-2" :class="'bg-' + data[indextr].statusColor"></div>{{data[indextr].status}}</span>
                  </vs-td>
                  <vs-td :data="data[indextr].orderNo">
                    <ul class="users-liked user-list">
                        <li v-for="(user, userIndex) in data[indextr].usersLiked" :key="userIndex">
                            <vx-tooltip :text="user.name" position="bottom">
                                <vs-avatar :src="user.img" size="30px" class="border-2 border-white border-solid -m-1"></vs-avatar>
                            </vx-tooltip>
                        </li>
                    </ul>
                  </vs-td>
                  <vs-td :data="data[indextr].orderNo">
                    <span>{{data[indextr].location}}</span>
                  </vs-td>
                  <vs-td :data="data[indextr].orderNo">
                    <span>{{data[indextr].distance}}</span>
                    <vs-progress :percent="data[indextr].distPercent" :color="data[indextr].statusColor"></vs-progress>
                  </vs-td>
                  <vs-td :data="data[indextr].orderNo">
                    <span>{{data[indextr].startDate}}</span>
                  </vs-td>
                  <vs-td :data="data[indextr].orderNo">
                    <span>{{data[indextr].estDelDate}}</span>
                  </vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>

        </vx-card>
      </div>
    </div>

  </div>
</template>

<script>
import VueApexCharts from 'vue-apexcharts'
import StatisticsCardLine from '@/components/statistics-cards/StatisticsCardLine.vue'
import analyticsData from './ui-elements/card/analyticsData.js'
import ChangeTimeDurationDropdown from '@/components/ChangeTimeDurationDropdown.vue'
import VxTimeline from "@/components/timeline/VxTimeline"
import axios from "axios";

export default {
    data() {
        return {
            checkpointReward: {},
            subscribersGained: {},
            ordersRecevied: {},
            salesBarSession: [],
            supportTracker: {},
            productsOrder: {},
            salesRadar: {},
            collegeCount: 0,
            blogviewCount: 0,
            blogCount: 0,
            viewCount: 0,
            timelineData: [
              {
                color: "primary",
                icon: "PlusIcon",
                title: "Client Meeting",
                desc: "Bonbon macaroon jelly beans gummi bears jelly lollipop apple",
                time: "25 mins Ago"
              },
              {
                color: "warning",
                icon: "MailIcon",
                title: "Email Newsletter",
                desc: "Cupcake gummi bears soufflé caramels candy",
                time: "15 Days Ago"
              },
              {
                color: "danger",
                icon: "UsersIcon",
                title: "Plan Webinar",
                desc: "Candy ice cream cake. Halvah gummi bears",
                time: "20 days ago"
              },
              {
                color: "success",
                icon: "LayoutIcon",
                title: "Launch Website",
                desc: "Candy ice cream cake. Halvah gummi bears Cupcake gummi bears soufflé caramels candy.",
                time: "25 days ago"
              },
              {
                color: "primary",
                icon: "TvIcon",
                title: "Marketing",
                desc: "Candy ice cream cake. Halvah gummi bears Cupcake gummi bears.",
                time: "28 days ago"
              }
            ],


            analyticsData: analyticsData,
            dispatchedOrders: [],
        }
    },
    components: {
        VueApexCharts,
        StatisticsCardLine,
        ChangeTimeDurationDropdown,
        VxTimeline
    },
    methods:{
        getData(){
            axios.get('/api/statistics/data')
                .then((res) => {
                    this.collegeCount = res.data.count;
                    this.blogCount = res.data.blog;
                    this.blogviewCount = res.data.blogV;
                    this.viewCount = res.data.views;
                })
                .catch((err) => {
                    console.log(err)
                })
        },
        getStat(){
            axios.get('/api/properties/getStat')
                .then((res) => {
                    console.log(res.data);
                    this.salesBarSession = res.data;
                })
                .catch((err) => {
                    console.log(err)
                })
        }
    },
    created() {
        this.getData()
        this.getStat()
      //  User Reward Card
      this.$http.get("/api/user/checkpoint-reward")
        .then((response) => { this.checkpointReward = response.data })
        .catch((error)   => { console.log(error) })

      // Subscribers gained - Statistics
      this.$http.get("/api/card/card-statistics/subscribers")
        .then((response) => { this.subscribersGained = response.data })
        .catch((error)   => { console.log(error) })

      // Orders - Statistics
      this.$http.get("/api/card/card-statistics/orders")
        .then((response) => { this.ordersRecevied = response.data })
        .catch((error)   => { console.log(error) })

      // // Sales bar - Analytics
      // this.$http.get("/api/card/card-analytics/sales/bar")
      //   .then((response) => { this.salesBarSession = response.data })
      //   .catch((error)   => { console.log(error) })

      // Dispatched Orders
      this.$http.get("/api/table/dispatched-orders")
        .then((response) => { this.dispatchedOrders = response.data })
        .catch((error)   => { console.log(error) })
    }
}
</script>

<style lang="scss">
/*! rtl:begin:ignore */
#dashboard-analytics {
  .greet-user{
    position: relative;

    .decore-left{
      position: absolute;
      left:0;
      top: 0;
    }
    .decore-right{
      position: absolute;
      right:0;
      top: 0;
    }
  }

  @media(max-width: 576px) {
    .decore-left, .decore-right{
      width: 140px;
    }
  }
}
/*! rtl:end:ignore */
</style>
