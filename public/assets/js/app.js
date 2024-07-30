axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

const get = async (route,data={}) => {
  return await axios.get("api/v1"+route,{params:data}).then(response => response.data).catch(error=>error.response.data)
}

const year=document.getElementById('year');

year.addEventListener('change',async (e)=>{
  //const year = e.target.options[e.target.selectedIndex].value;
  const year = e.target.value;
  const data={year:year,code:code}
  const result=await get('/fee',data);
  const output=document.getElementById('fee');
  output.innerHTML=`Total Fee : ${result.data.fee}`
})