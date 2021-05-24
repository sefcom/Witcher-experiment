#!/usr/bin/env bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

if [[ -z ${1} ]]; then
    builds=( cve-* phpbb oscommerce wordpress ) 
else
    builds=( "$@" )
fi

# for b in "${builds[@]}"; do
  
#     docker_img_name="witcher/${b}"
#     echo $docker_img_name;
#     puppeteer_img_name="puppeteer1337/${b}"
#     dockerfile_path="${DIR}/${b}/Dockerfile"
#     context="${DIR}/${b}"
#     printf "\033[34mBuilding ::> ${docker_img_name} using Dockerfile ${dockerfile_path} and context ${context}\033[0m\n"
#     echo 'docker build -t '${docker_img_name}' -f "'${dockerfile_path}'" "'${context}'"'
#     if docker build -t ${docker_img_name} -f "${dockerfile_path}" "${context}"; then
#         printf "\033[32mSucessfully built ${docker_img_name} using Dockerfile ${dockerfile_path} and context ${context}\033[0m\n"
#         docker tag ${docker_img_name} ${puppeteer_img_name}
#     else
#         printf "\033[31mFailed to build ${docker_img_name} using Dockerfile ${dockerfile_path} and context ${context}\033[0m\n"
#         exit 191
#     fi
# done

echo "done building, pushing now"

for b in "${builds[@]}"; do

    puppeteer_img_name="puppeteer1337/${b}"
    
    docker push ${puppeteer_img_name}

done 



