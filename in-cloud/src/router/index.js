import Vue from 'vue'
import Router from 'vue-router'
import home from '@/components/home'
import mobile from '@/components/mobile'
import bigData from '@/components/bigData'
import developNews from '@/components/developNews'
import aboutUs from '@/components/aboutUs'
import detail from '@/components/detail'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: home
    },
    {
      path: '/mobile',
      name: 'mobile',
      component: mobile
    },
    {
      path: '/bigdata',
      name: 'bigData',
      component: bigData
    },
    {
      path: '/developnews',
      name: 'developNews',
      component: developNews
    },
    {
      path: '/aboutus',
      name: 'aboutUs',
      component: aboutUs
    },
    {
      path: '/detail',
      name: 'detail',
      component: detail
    }
  ]
})
