data=$(curl -s https://raw.githubusercontent.com/flow-php/flow/refs/heads/1.x/manifest.json)

# Use 'jq' to extract the `.packages[].name` fields as a space-separated list
repos=$(echo "$data" | jq -r '.packages[].name')

echo "Here are the listed repos:\n$repos"

for REPOSITORY in $repos
do
    echo "Cloning $REPOSITORY"
    git clone --branch 1.x https://${GH_TOKEN}:x-oauth-basic@github.com/$REPOSITORY output

    cd output

    count=$(git rev-list --count $(git describe --abbrev=0 --tags)..HEAD)

    cd ..
    rm -rf output

    # Example call to your PHP script
    php ./src/image.php $REPOSITORY $count
done
