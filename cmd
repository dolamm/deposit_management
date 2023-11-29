if [ "$1" = "--dbreset" -o "$1" = "-dbr" ]; then
    bash ./bash/dbreset
elif [ "$1" = "--install" -o "$1" = "-i" ]; then
    bash ./bash/install
elif [ "$1" = "--start" -o "$1" = "-s" ]; then
    bash ./bash/start
elif [ "$1" = "--rebuild" -o "$1" = "-rb" ]; then
    bash ./bash/rebuild
fi
