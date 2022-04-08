import 'bootstrap/dist/css/bootstrap.min.css'
import ArticleCard from './components/ArticleCard'
import ArticleForm from './components/ArticleForm';
import React from "react"
import useFetch from './hook/useFetch';
import {PostInterface} from './interface/PostInterface'

function App() {

const url = 'http://localhost:2345/api/read.php'
const { data, error } = useFetch<PostInterface[]>(url)


if(!data && !error) return <p>Loading...</p>
if (error) return <p>There is an error.</p>

if(data && data){
    return (
      <>
      <ArticleForm />
      {data.map( post => 
      <ArticleCard key={post.id} title={post.title} content={post.content} /> 
      )
    }
    </>
    )
  }

  return <></>
}
export default App;
