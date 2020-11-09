const getUsers = async () => {

    const response = await fetch('api/handler.php')
    const result = await response.json()

    // console.log(result)
    // debugger

    let innerHTML = ''
    if(result.status === false) {
        innerHTML = result.msg
        document.querySelector('.content').innerHTML = innerHTML
        return
    }

    console.log(result)
    for (let key in result) {

        const email = result[key]["email"]
        const name  = result[key]["name"]
        const phone = result[key]["phone"]

        innerHTML += `
            <form class="getUser" data-id="${key}" onclick="event.preventDefault()">
                <input type="hidden" name="idUser" id="idUser" value="${name}">
                <h2 class="blog">${name}</h2>
                <table>
                    <tr>
                        <td>
                            <span>имя: </span>
                        </td>
                        <td>
                        <input type="hidden" name="idUser" id="idUser" value="${key}">
                            <input type="text" name="name" disabled value="${name}">    
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>телефон: </span>
                        </td>
                        <td>
                            <input type="text" name="phone" disabled value="${phone}">   
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>email: </span>
                        </td>
                        <td>
                            <input type="text" name="email" disabled value="${email}">    
                        </td>
                    </tr>

                </table>

                <button class="edit" onclick="editUser('${name}', '${phone}', '${email}')">edit</button>
                <button class="delete" onclick="deleteUser('${key}')">delete</button>
            </form>
    `
    }
    document.querySelector('.content').innerHTML = innerHTML
}

const getUser = async (id) => {

    const response = await fetch(`api/handler.php?id=${id}`)
    const result   = await response.json()

    console.log(result)
}

const editUser = (name, phone, email) =>{

    document.querySelector('.editUser').idUser.value = name
    document.querySelector('.editUser').name.value = name
    document.querySelector('.editUser').email.value = email
    document.querySelector('.editUser').phone.value = phone
}

const updateUser = async () => {

    const targetName = document.querySelector('.editUser').idUser.value
    const name = document.querySelector('.editUser').name.value
    const email = document.querySelector('.editUser').email.value
    const phone = document.querySelector('.editUser').phone.value
    
    const data = {targetName, name, email, phone}

    const response = await fetch('api/handler.php', {
        method  : 'PUT',
        body    : JSON.stringify(data)
    })  
    const result   = await response.json() 
    console.log(result)
    if(result.status){
        await getUsers()
    }
}

const addUser = async () => {

    const form =document.querySelector('.adduser')
    const formData = new FormData(form)

    const response = await fetch('api/handler.php', {
        method: 'POST',
        body: formData
    })

    const result   = await response.json() 

    console.log(result)
    if(result.status){
        await getUsers()
    }
}

const deleteUser = async (id) => {

    const body = {
        id
    }

    const response = await  fetch('api/handler.php', {
        method: 'DELETE',
        body: JSON.stringify(body)
    }) 

    const result   = await response.json() 
    console.log(result)
    if(result.status){
        await getUsers()
    }
}

// deleteUser(852)
// addUser("Drew", "852", "sf45df4")
// updateUser()
// getUser(851)
getUsers()